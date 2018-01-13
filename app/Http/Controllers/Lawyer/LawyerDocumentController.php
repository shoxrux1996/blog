<?php

namespace yuridik\Http\Controllers\Lawyer;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Session;
use Mews\Purifier\Facades\Purifier;
use yuridik\Admin;
use yuridik\Client;
use yuridik\File;
use yuridik\Http\Controllers\Controller;
use yuridik\Document;
use Auth;
use yuridik\Lawyer;
use yuridik\Notifications\ClientRequestNotification;
use yuridik\Notifications\RequestNotification;
use yuridik\Notifications\ResponseNotification;
use yuridik\Request as Reques;
use yuridik\Response;
use Validator;
class LawyerDocumentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:lawyer');
    }

    public function index()
    {
        $documents = Document::where('approved', 1)->orderByDesc('created_at')->paginate(5);

        return view('document.list')->withDocuments($documents);
    }

    public function myRequests()
    {
        $id = array();
        foreach (Auth::user()->requests->unique('document_id') as $request) {
            array_push($id, $request->document->id);
        }
        $documents = Document::where('id', $id)->orderBy('id', 'desc')->paginate(3);
        return view('document.list')->withDocuments($documents);
    }

    public function show(Request $request, $id)
    {
        $document = Document::findOrFail($id);
        $show = 1;
        foreach ($document->requests as $key) {
            if ($key->lawyer_id == Auth::guard('lawyer')->user()->id && $key->status == 1)
                $show = 0;
            elseif($key->lawyer_id == Auth::guard('lawyer')->user()->id)
                $show = 2;
        }

        return view('document.show')->withDocument($document)->withShow($show);
    }

    public function sendRequest(Request $request, $id)
    {
        $this->validate($request, ['description' => 'required|min:6',]);

        $document = Document::findOrFail($id);
        $lawyer = Auth::guard('lawyer')->user();
        $reques = new Reques;
        $reques->description = $request->description;
        $reques->lawyer_id = $lawyer->id;
        $reques->status = 0;
        if ($request->payment_type == "about")
            $reques->price = $document->cost;

        else {
            $reques->price = $request->price;
        }
        $reques->until_at = $request->date;

        $document->requests()->save($reques);
        $client = Client::findOrFail($document->client_id);
        Notification::send($client, new RequestNotification($reques));
        return redirect()->back();
    }

    public function storeResponse(Request $request, $id)
    {
        $rules = array(
            'text' => 'required|min:5|max:10000'
        );
        $count = count($request->file('files')) - 1;

        foreach (range(0, $count) as $i) {
            $rules['files.' . $i] = 'mimes:doc,docx,pdf|max:3000';
        }
        Validator::make($request->all(), $rules)->validate();


//        $document = Document::findOrFail($id);
        $lawyer = Auth::guard('lawyer')->user();

        $response = new Response;
        $response->text = Purifier::clean($request->text);
        $response->request_id = $id;
        $lawyer->responses()->save($response);


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
        $client = Client::findOrFail($response->request->document->client_id);
//        $admins = Admin::all();
        Notification::send($client, new ResponseNotification($response));
//        Notification::send($admins, new AnswerNotification($response));
//        // $comment->blog()->associate($blog);
//        Session::flash('success', 'Answer was added');
        return redirect()->back();

    }

}
