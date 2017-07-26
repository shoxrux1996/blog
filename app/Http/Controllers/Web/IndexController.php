<?php

namespace yuridik\Http\Controllers\Web;
use yuridik\Http\Controllers\Controller;

use yuridik\Question;
use yuridik\Category;
use yuridik\Lawyer;
use yuridik\Blog;
use yuridik\Chosen;
use Illuminate\Support\Facades\Session;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $num_of_questions = Question::count();
        $free_question_examples = Question::orderBy('id', 'desc')->where('type','1')->take(6)->get();
        $paid_question_examples = Question::orderBy('id', 'desc')->where('type','2')->take(6)->get();

        $categories = Category::all();

        // $chosen = Chosen::all();

        $num_of_lawyers = Lawyer::count();
        /*$chosen_lawyers=array();
        foreach ($chosen as $var) {
            if($var->name==="lawyer")
                array_push($chosen_lawyers, Lawyer::find($var->id));
        }
        //$chosen_lawyers=Lawyer::find(Chosen::where('name','lawyer')->get());//alternate method

        $chosen_blogs=array();
        foreach ($chosen as $var) {
            if($var->name==="blog")
                array_push($chosen_blogs, Blog::find($var->id));
        }
        //$chosen_blogs=Blog::find(Chosen::where('name','blog')->get());//alternate method*/

        return view('index',compact('num_of_lawyers','num_of_questions','free_question_examples','paid_question_examples','categories'));/*,$chosen_blogs,$chosen_lawyers*/
    }
    
  
    
}
