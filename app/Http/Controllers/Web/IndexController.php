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
        $free_question_examples = Question::where('type', 0)->orderBy('id', 'desc')->take(6)->get();
        $paid_question_examples = Question::where('type',1)->orWhere('type', 2)->orderBy('id', 'desc')->take(6)->get();
        $blogs = Blog::orderBy('count', 'desc')->take(3)->get();
        $categories = Category::where('category_id', null)->get();
        $lawyers = Lawyer::orderBy('id', 'desc')->take(6)->get();
        // $chosen = Chosen::all();

        $num_of_lawyers = Lawyer::count();

        return view('index', compact('num_of_lawyers', 'num_of_questions', 'free_question_examples', 'paid_question_examples', 'categories', 'blogs', 'lawyers'));/*,$chosen_blogs,$chosen_lawyers*/
    }


}
