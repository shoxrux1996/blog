<?php

namespace yuridik\Http\Controllers\Client;
use yuridik\Http\Controllers\Controller;

use Illuminate\Http\Request;
use yuridik\Document;
use yuridik\Category;
use yuridik\File;
use yuridik\Client;
use Illuminate\Support\Facades\Session;
use Auth;
use Validator;
use DB;

class ClientDocumentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:client');
    }

    public function create(){
        $client = Auth::user();
        $type = DB::table('document_type')->get();
        foreach ($type as $var) {
            if($var->parent_id==NULL)
                $types[$var->id]=$var->name;
            else{
                $subtypes[$var->id]=$var->name;
                $parents[$var->id]=$var->parent_id;
            }
        }
        foreach ($type as $value) {
            if($value->parent_id == 1)
                $default_option[$value->id]=$value->name;
        }
        return view('document.create')->withClient($client)->withTypes($types)->withSubtypes($subtypes)->withParents($parents)->withDefault_options($default_option);
    }
    public function store(Request $request){
       $rules = array(
            'title' => 'required|min:3',
            'description' => 'required|min:10',

            );
       
       
        $client=Auth::guard('client')->user();
        $count = count($request->file('files'))-1;
        foreach(range(0, $count) as $i) {
             $rules['files.' . $i] = 'mimes:doc,docx,pdf|max:3000';
        }
        Validator::make($request->all(), $rules)->validate();
        
        $document = new Document;
        $document->title = $request->title;
        $document->description = $request->description;
        $document->sub_type_id = $request->subType;
        $document->payment_type = $request->payment_type;
        if($request->payment_type=="about")
            $document->cost=$request->cost;


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
        Session::flash('message', 'Request submitted successfully');
        return redirect()->route('client.dashboard');       
    }
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}