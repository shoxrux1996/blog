<?php

namespace yuridik\Http\Controllers\Web;

use function foo\func;
use yuridik\Answer;
use yuridik\Http\Controllers\Controller;
use Illuminate\Http\Request;
use yuridik\Lawyer;
use yuridik\Category;
use yuridik\Client;
use yuridik\City;
use yuridik\Question;
use yuridik\User;
use Illuminate\Database\Eloquent\Collection;

class LawyersInfoController extends Controller
{
    public function showLawyersList()
    {
        $categories = Category::where('category_id', null)->get();
        $lawyers = Lawyer::where('type', 2)->orderBy('id', 'desc')->paginate(8);
        $best_lawyers = Lawyer::where('type', 2)->with('feedbacks')->take(4)->get()->sortByDesc(function ($query) {
            return $query->feedbacks->count();
        });
        $cities = City::orderBy('name', 'asc')->get();

        return view('lawyer.list')->withLawyers($lawyers)
            ->withCategories($categories)->withCities($cities)
            ->withBest_lawyers($best_lawyers);
    }

    public function show($id)
    {
        $lawyer=Lawyer::find($id);
        $questions = Question::with('answers')->whereHas('answers',function($query) use ($id){
            $query->with('lawyer')->whereHas('lawyerable', function($query) use ($id){
                $query->where('id', $id);
            });
        })->paginate(8, ['*'],'questions');

        $blogs = $lawyer->blogs()->paginate(8,['*'],'blogs');

        return view('lawyer.show')->withLawyer($lawyer)->withQuestions($questions)->withBlogs($blogs);
    }

}
