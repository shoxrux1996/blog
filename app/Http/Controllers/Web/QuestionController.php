<?php

namespace yuridik\Http\Controllers\Web;

use yuridik\Http\Controllers\Controller;

use Illuminate\Http\Request;
use yuridik\Question;
use yuridik\Category;
use yuridik\File;
use yuridik\Client;
use yuridik\Lawyer;
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

        $questions = Question::orderBy('id', 'desc')->paginate(5);
        $questions_costly = Question::where('type', 1)->orWhere('type',2)
            ->orderBy('id', 'desc')->paginate(5);

        $questions_free = Question::where('type', 0)
            ->orderBy('id', 'desc')->paginate(5);
        $best_lawyers = Lawyer::with('feedbacks')->take(4)->get()->sortByDesc(function ($query) {
            return $query->feedbacks->count();
        });
        $categories = Category::where('category_id', null)->get();

        return view('question.list')->withQuestions($questions)
            ->withQuestions_costly($questions_costly)->withBest_lawyers($best_lawyers)
            ->withQuestions_free($questions_free)->withCategories($categories)->withSection(1);
    }

    public function show($id)
    {
        $question = Question::find($id);
        return view('question.question_show')->withQuestion($question);
    }

    public function freeQuestions()
    {
        $categories = Category::where('category_id', null)->get();

        $questions = Question::orderBy('id', 'desc')->paginate(5);
        $questions_costly = Question::where('type', [1, 2])
            ->orderBy('id', 'desc')->paginate(5);
        $questions_free = Question::where('type', 0)
            ->orderBy('id', 'desc')->paginate(5);
        $best_lawyers = $best_lawyers = Lawyer::with('feedbacks')->take(4)->get()->sortByDesc(function ($query) {
            return $query->feedbacks->count();
        });

        return view('question.list')->withQuestions($questions)
            ->withQuestions_costly($questions_costly)->withBest_lawyers($best_lawyers)
            ->withQuestions_free($questions_free)
            ->withCategories($categories)
            ->withSection(3);
    }

    public function costlyQuestions()
    {
        $categories = Category::where('category_id', null)->get();

        $questions = Question::orderBy('id', 'desc')->paginate(5);
        $questions_costly = Question::where('type', 1)->orWhere('type',2)->orderBy('id', 'desc')->paginate(5);
        $questions_free = Question::where('type', 0)
            ->orderBy('id', 'desc')->paginate(5);
        $best_lawyers = $best_lawyers = Lawyer::with('feedbacks')->take(4)->get()->sortByDesc(function ($query) {
            return $query->feedbacks->count();
        });
        return view('question.list')->withQuestions($questions)
            ->withQuestions_costly($questions_costly)->withBest_lawyers($best_lawyers)
            ->withQuestions_free($questions_free)->withSection(2)->withCategories($categories);
    }


}
