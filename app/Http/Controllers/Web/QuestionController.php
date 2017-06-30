<?php

namespace yuridik\Http\Controllers\Web;
use yuridik\Http\Controllers\Controller;

use Illuminate\Http\Request;
use yuridik\Question;
use yuridik\Category;
use yuridik\File;
use yuridik\Client;
use Illuminate\Support\Facades\Session;
use Auth;
use Validator;
class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = Question::all();
        return view('question.index')->withQuestions($questions);
    }
     public function show($id){
        $question = Question::find($id);
        return view('question.question_show')->withQuestion($question);
    }
  
    
}
