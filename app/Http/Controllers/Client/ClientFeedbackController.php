<?php

namespace yuridik\Http\Controllers\Client;

use Illuminate\Http\Request;
use yuridik\Http\Controllers\Controller;
use yuridik\Feedback;
use yuridik\Answer;
use Session;
use Auth;
class ClientFeedbackController extends Controller
{
	public function __construct(){
		$this->middleware('auth:client');
	}
    public function store(Request $request, $answer_id){
    	$client = Auth::guard('client')->user();
    	
    	$answer = Answer::findOrFail($answer_id);
    	$feedback = new Feedback;
    	$feedback->text = $request->text;
    	$feedback->helped =$request->helped;
    	$feedback->client_id = $client->id;
    	$feedback->answer_id = $answer->id;
    	$feedback->save();

		Session::flash('message', 'Feedback created successfully');
    	return redirect()->back();
    }
}
