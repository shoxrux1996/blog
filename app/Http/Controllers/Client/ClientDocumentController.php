<?php

namespace yuridik\Http\Controllers\Client;

use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Validator;
use Mews\Purifier\Facades\Purifier;
use yuridik\Admin;
use yuridik\Fee;
use yuridik\Http\Controllers\Controller;

use Illuminate\Http\Request;
use yuridik\Document;
use yuridik\Category;
use yuridik\File;
use yuridik\Client;
use Illuminate\Support\Facades\Session;
use Auth;
use DB;
use yuridik\Lawyer;
use yuridik\Notifications\DocumentsNotification;
use yuridik\Request as Reques;
use yuridik\Order;
use yuridik\Notifications\RequestNotification;
use yuridik\Notifications\ResponseNotification;
use yuridik\Response;

class ClientDocumentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:client');
    }

    public function create()
    {
        $type = DB::table('document_type')->get();
        foreach ($type as $var) {
            if ($var->parent_id == NULL)
                $types[$var->id] = $var->name;
            else {
                $subtypes[$var->id] = $var->name;
                $parents[$var->id] = $var->parent_id;
            }
        }
        $type_definition = array('', 'Комплекты документов для регистрации ООО, ИП, ТСЖ и др.', 'Исковое заявление, отзыв на исковое заявление, ходатайство, жалоба на решение суда и др.', 'Жалоба на действия должностного лица, судебного пристава, сотрудника ГИБДД и др.', 'Договоры аренды, подряда, купли-продажи, займа, комиссии и др.', 'Претензии на возврат денег за товар. Претензии в страховую, в банк, к ЖКХ и др.', 'Любой другой документ. Вы можете описать его самостоятельно.');
        foreach ($type as $value) {
            if ($value->parent_id == 1)
                $default_option[$value->id] = $value->name;
        }
        return view('document.create')->withTypes($types)->withSubtypes($subtypes)->withParents($parents)->withDefault_options($default_option)->withDefinitions($type_definition);
    }


    public function store(Request $request)
    {

        $messages = [
            'required' => 'Обязательно к заполнению',
            'string' => 'Неправильный формат',
            'title.min' => 'Минимум 3 символов',
            'description.min' => 'Минимум 10 символов',
            'mimes' => 'Неверный формат(doc,docx,pdf)',
            'max' => 'Файл слишком велик',
        ];
        $rules = array(
            'title' => 'required|min:3',
            'description' => 'required|min:10',

        );

        $client = Auth::guard('client')->user();
        $count = count($request->file('files')) - 1;
        foreach (range(0, $count) as $i) {
            $rules['files.' . $i] = 'mimes:doc,docx,pdf|max:3000';
        }
        Validator::make($request->all(), $rules, $messages)->validate();

        $document = new Document;
        $document->title = $request->title;
        $document->description = $request->description;
        $document->sub_type_id = $request->subType;
        $document->payment_type = $request->payment_type;

        if ($request->payment_type == "about")
            $document->cost = $request->cost;


        $document->client_id = $client->id;

        $document->save();

        if ($request->file('files') != null) {
            $file = $request->file('files');
            foreach ($file as $key) {
                $fil = new File;
                $fil->file = $key->getClientOriginalName();
                $upload_folder = '/documents/' . time() . '/';
                $fil->path = $upload_folder;
                $document->files()->save($fil);
                $key->move(public_path() . $upload_folder, $key->getClientOriginalName());
            }
        }
        $lawyers = Lawyer::where('type', 2)->get();
        $admins = Admin::all();
        Notification::send($lawyers, new DocumentsNotification($document));
        Notification::send($admins, new DocumentsNotification($document));
        Session::flash('message', 'Request submitted successfully');
        return redirect()->route('client.dashboard');
    }

    public function myDocs()
    {
        $documents = Auth::guard('client')->user()->documents;
        return view('client.documents')->withDocuments($documents);
    }

    public function showDoc($id)
    {
        $document = Document::findOrFail($id);
        return view('client.document_show')->withDocument($document);
    }

    public function acceptRequest(Request $request, $id)
    {
        $reques = Reques::findOrFail($id);
        $client = Auth::guard('client')->user();
        if ($client->user->balance() >= $reques->price) {
            $order = new Order;
            $order->user_id = $client->user->id;
            $order->amount = $reques->price;
            $reques->document->update(['cost' => $order->amount, 'status' => 1]);

            $reques->document->orders()->save($order);
            $reques->status=1;
            $reques->save();
            $lawyer = Lawyer::findOrFail($reques->lawyer->id);
            $admins = Admin::all();
            Notification::send($lawyer, new RequestNotification($reques));
            Notification::send($admins, new RequestNotification($reques));
            Session::flash('message', 'Order created successfully');
            return redirect()->route('client.dashboard');
        } else {
            Session::flash('message', 'Not enough money, Please charge your balance');
            return redirect()->route('card.payment');
        }
    }

    public function rejectRequest(Request $request, $id)
    {
        $reques = Reques::findOrFail($id);
        $reques->status = -1;
        $reques->save();
        $lawyer = Lawyer::findOrFail($reques->lawyer->id);
        Notification::send($lawyer, new RequestNotification($reques));
        return redirect()->back();
    }

    public function responseDocument(Request $request, $id)
    {
        $rules = array(
            'text' => 'required|min:5|max:10000'
        );
        $count = count($request->file('files')) - 1;
        foreach (range(0, $count) as $i) {
            $rules['files.' . $i] = 'mimes:doc,docx,pdf|max:3000';
        }
        Validator::make($request->all(), $rules)->validate();
        $reques = Reques::findOrFail($id);
        $client = Auth::guard('client')->user();
        $response = new Response;
        $response->text = Purifier::clean($request->text);
        $response->request_id = $reques->id;
        $client->responses()->save($response);
        if ($request->file('files') != null) {
            $file = $request->file('files');
            foreach ($file as $key) {
                $fil = new File;
                $fil->file = $key->getClientOriginalName();
                $upload_folder = '/answers/' . time() . '/';
                $fil->path = $upload_folder;
                $response->files()->save($fil);
                $key->move(public_path() . $upload_folder, $key->getClientOriginalName());
            }
        }
        $lawyer = Lawyer::findOrFail($reques->lawyer->id);
        Notification::send($lawyer, new ResponseNotification($response));
        return redirect()->back();
    }

    public function closeDocument(Request $request, $id)
    {
        $document = Document::findOrFail($id);
        $document->status=2;
        $fee = new Fee;
        $lawyer = Lawyer::findOrFail($document->requests->where('status',1)->first()->lawyer->id);
        $fee->user_id = $lawyer->user->id;
        $fee->amount = $document->cost*0.7;
        $document->fees()->save($fee);
        $document->save();
        $lawyer = Lawyer::findOrFail($lawyer->id);
        $admins = Admin::all();
        Notification::send($lawyer, new DocumentsNotification($document));
        Notification::send($admins, new DocumentsNotification($document));
        return redirect()->back();
    }

    public function complainDocument(Request $request, $id)
    {

    }
}