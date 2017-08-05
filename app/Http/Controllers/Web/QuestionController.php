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
        $questions = Question::orderBy('id','desc')->paginate(5);
        $questions_costly = Question::where('type',2)
            ->orderBy('id','desc')->paginate(5);
        $questions_free = Question::where('type',1)
            ->orderBy('id','desc')->paginate(5);
        return view('question.list')->withQuestions($questions)
            ->withQuestions_costly($questions_costly)
            ->withQuestions_free($questions_free)->withSection(1);
    }
     public function show($id){
        $question = Question::find($id);
        return view('question.question_show')->withQuestion($question);
    }
    public function freeQuestions(){
        $questions = Question::orderBy('id','desc')->paginate(5);
        $questions_costly = Question::where('type',2)
            ->orderBy('id','desc')->paginate(5);
        $questions_free = Question::where('type',1)
            ->orderBy('id','desc')->paginate(5);
        return view('question.list')->withQuestions($questions)
            ->withQuestions_costly($questions_costly)
            ->withQuestions_free($questions_free)->withSection(3);
    }
    public function costlyQuestions(){
        $questions = Question::orderBy('id','desc')->paginate(5);
        $questions_costly = Question::where('type',2)
            ->orderBy('id','desc')->paginate(5);
        $questions_free = Question::where('type',1)
            ->orderBy('id','desc')->paginate(5);
        return view('question.list')->withQuestions($questions)
            ->withQuestions_costly($questions_costly)
            ->withQuestions_free($questions_free)->withSection(2);
    }
  
    
}
