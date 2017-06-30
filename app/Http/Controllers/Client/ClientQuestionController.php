<?php

namespace yuridik\Http\Controllers\Client;
use yuridik\Http\Controllers\Controller;

use Illuminate\Http\Request;
use yuridik\Question;
use yuridik\Category;
use yuridik\File;
use yuridik\Client;
use Illuminate\Support\Facades\Session;
use Auth;
use Validator;

class ClientQuestionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:client');
    }
    public function create()
    {
        $category = Category::all();
        
        $categories = array(' ' => null);
        foreach ($category as $key) {
            $categories[$key->id] = $key->name;
        }
      
        return view('question.create')->withCategories($categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = array(
           'title' => 'required|min:3',
            'text' => 'required|min:10',
            );

       
        $count = count($request->file('files'))-1;
    

        foreach(range(0, $count) as $i) {
             $rules['files.' . $i] = 'mimes:doc,docx,pdf|max:3000';
        }
        Validator::make($request->all(), $rules)->validate();
        $question = new Question;
        $question->title = $request->title;
        $question->text = $request->text;
        $question->category_id = $request->category;

        $client=Client::where('email',$request->email)->first();

        $question->client_id = $client->id;
        $question->type_id = 1;
        $question->save();

         if($request->file('files') != null) {

            $file = $request->file('files');
             foreach ($file as $key) {
                $fil = new File;
                $fil->file = $key->getClientOriginalName();
                $upload_folder = '/questions/'.time().'/';
                $fil->path = $upload_folder;
             
                $fil->save();
                $question->files()->attach($fil->id);

                
                $key->move(public_path() . $upload_folder, $key->getClientOriginalName());
                
            }
        }
        Session::flash('message', 'Question created successfully');
        return redirect()->route('client.dashboard');                
    }


}
