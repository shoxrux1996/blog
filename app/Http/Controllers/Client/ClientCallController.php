<?php

namespace yuridik\Http\Controllers\Client;

use Illuminate\Support\Facades\Validator;
use yuridik\Http\Controllers\Controller;

use Illuminate\Http\Request;
use yuridik\Call;
use yuridik\File;
use yuridik\Client;
use Illuminate\Support\Facades\Session;
use Auth;
use yuridik\Request as Reques;
use yuridik\Order;

class ClientCallController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:client');
    }

    public function create()//redirects to page where client can create new "call order"
    {
        $client = Auth::user();// using this variable client's info can be accessed ex. name, email

        return view('call.create')->withClient($client);
    }


    public function store(Request $request)//creates new "call order" in Database
    {
        $rules = array(
            'title' => 'required|min:3',//request input for call's title must have attribute "name=title"
            'description' => 'required|min:10',//request input for call's description must have attribute "name=description"
        ); // validation rules to check request data

        $client = Auth::user();
        $count = count($request->file('files')) - 1;
        foreach (range(0, $count) as $i) {
            $rules['files.' . $i] = 'mimes:doc,docx,pdf|max:3000';//validation rule for files
        }
        Validator::make($request->all(), $rules)->validate();

        $call = new Call;
        $call->title = $request->title;
        $call->description = $request->description;
        if ($request->type == 2) {
            if ($client->user->balance() >= 25000) {
                Session::flash('call-create', 'Call created successfully');
            } else {
                Session::flash('message', 'Not enough money, Please charge your balance');
                return redirect()->route('card.payment');
            }
        }
        elseif ($request->type == 1) {
            if ($client->user->balance() >= 5000) {
                Session::flash('call-create', 'Call created successfully');
            } else {
                Session::flash('message', 'Not enough money, Please charge your balance');
                return redirect()->route('card.payment');
            }
        }
        elseif ($request->type == 1) {
            if ($client->user->balance() >= 5000) {
                Session::flash('call-create', 'Call created successfully');
            } else {
                Session::flash('message', 'Not enough money, Please charge your balance');
                return redirect()->route('card.payment');
            }
        }
        else{
            Session::flash('call-create', 'Wrong credentials');
            return back();
        }
        $call->status = 0;

        $call->client_id = $client->id;

        $call->save();

        if ($request->file('files') != null) {
            $file = $request->file('files');
            foreach ($file as $key) {
                $fil = new File;
                $fil->file = $key->getClientOriginalName();
                $upload_folder = '/calls/' . time() . '/';
                $fil->path = $upload_folder;
                $call->files()->save($fil);
                $key->move(public_path() . $upload_folder, $key->getClientOriginalName());
            }
        }
        $order = new Order;
        $order->user_id = $call->client->user->id;
        $order->amount = $call->cost;
        $call->orders()->save($order);
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


        $document_status = true;
        if ($document->status == 1) {
            $document_status = false;
        }

        return view('client.document_show')->withDocument($document)->withShow($document_status);
    }

    public function acceptRequest(Request $request, $id)
    {
        $reques = Reques::findOrFail($id);
        $client = Auth::guard('client')->user();
        if ($client->user->balance() >= $reques->price) {
            $order = new Order;
            $order->user_id = $client->user->id;
            $order->amount = $reques->price;
            $reques->document->update(['status' => 1]);

            $reques->document->orders()->save($order);
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
        $reques->status = 0;
        $reques->save();
    }
}