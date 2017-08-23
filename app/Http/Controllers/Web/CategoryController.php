<?php

namespace yuridik\Http\Controllers\Web;

use yuridik\Http\Controllers\Controller;
use Illuminate\Http\Request;
use yuridik\Category;
use yuridik\Question;
use yuridik\Lawyer;
use yuridik\ItemsHelper;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::where('category_id', null)->get();
        return view('category.index')->withCategories($categories);
    }

    /**
     * @param $name
     * @return mixed
     */
    public function show($name)
    {
        $questions = Question::with('category')->whereHas('category', function ($query) use ($name) {
            $query->where('name', 'LIKE', "%$name%");
        })->orderBy('id', 'desc')->paginate(5);
        $questions_costly = Question::with('category')->whereHas('category', function ($query) use ($name) {
            $query->where('name', 'LIKE', "%$name%");
        })->where('type', 1)->orWhere('type',2)
            ->orderBy('id', 'desc')->paginate(5);

        $questions_free = Question::with('category')->whereHas('category', function ($query) use ($name) {
            $query->where('name', 'LIKE', "%$name%");
        })->where('type', 0)
            ->orderBy('id', 'desc')->paginate(5);
        $best_lawyers = Lawyer::with('feedbacks')->take(4)->get()->sortByDesc(function ($query) {
            return $query->feedbacks->count();
        });

        $lawyers = Lawyer::whereHas('categories', function ($query) use ($name){
            $query->where('name', 'LIKE', "%$name%")->orWhereHas('parent', function ($query) use ($name){
                $query->where('name', 'LIKE', "%$name%");
            });
        })->get();
        $category = Category::where('name', $name)->first();
        $cat1 = Category::where('id', '!=', $category->id)->orderBy('created_at', 'desc')->skip(0)->take(3)->get();
        $cat2 = Category::where('id', '!=', $category->id)->orderBy('created_at', 'desc')->skip(3)->take(4)->get();
        $categories = Category::where('category_id', null)->get();
        return view('category.show')
            ->withCategory($category)
            ->withCat1($cat1)
            ->withCat2($cat2)
            ->withBest_lawyers($best_lawyers)
            ->withQuestions($questions)
            ->withQuestions_free($questions_free)
            ->withQuestions_costly($questions_costly)
            ->withCategories($categories)
            ->withLawyers($lawyers)
            ->withSection(1);
    }
    public function freeQuestions($name)
    {
        $category = Category::where('name', $name)->first();
        $cat1 = Category::where('id', '!=', $category->id)->orderBy('created_at', 'desc')->skip(0)->take(3)->get();
        $cat2 = Category::where('id', '!=', $category->id)->orderBy('created_at', 'desc')->skip(3)->take(4)->get();

        $questions = Question::with('category')->whereHas('category', function ($query) use ($name) {
            $query->where('name', 'LIKE', "%$name%");
        })->orderBy('id', 'desc')->paginate(5);
        $questions_costly = Question::with('category')->whereHas('category', function ($query) use ($name) {
            $query->where('name', 'LIKE', "%$name%");
        })->where('type', [1, 2])
            ->orderBy('id', 'desc')->paginate(5);
        $questions_free =Question::with('category')->whereHas('category', function ($query) use ($name) {
            $query->where('name', 'LIKE', "%$name%");
        })->where('type', 0)
            ->orderBy('id', 'desc')->paginate(5);
        $best_lawyers = $best_lawyers = Lawyer::with('feedbacks')->take(4)->get()->sortByDesc(function ($query) {
            return $query->feedbacks->count();
        });
        $lawyers = Lawyer::whereHas('categories', function ($query) use ($name){
            $query->where('name', 'LIKE', "%$name%")->orWhereHas('parent', function ($query) use ($name){
                $query->where('name', 'LIKE', "%$name%");
            });
        })->get();
        $categories = Category::where('category_id', null)->get();
        return view('category.show')
            ->withCategory($category)
            ->withCat1($cat1)
            ->withCat2($cat2)
            ->withBest_lawyers($best_lawyers)
            ->withQuestions($questions)
            ->withQuestions_free($questions_free)
            ->withQuestions_costly($questions_costly)
            ->withCategories($categories)
            ->withLawyers($lawyers)
            ->withSection(2);
    }

    public function costlyQuestions($name)
    {
        $category = Category::where('name', $name)->first();
        $cat1 = Category::where('id', '!=', $category->id)->orderBy('created_at', 'desc')->skip(0)->take(3)->get();
        $cat2 = Category::where('id', '!=', $category->id)->orderBy('created_at', 'desc')->skip(3)->take(4)->get();

        $questions = Question::with('category')->whereHas('category', function ($query) use ($name) {
            $query->where('name', 'LIKE', "%$name%");
        })->orderBy('id', 'desc')->paginate(5);
        $questions_costly = Question::with('category')->whereHas('category', function ($query) use ($name) {
            $query->where('name', 'LIKE', "%$name%");
        })->where('type', 1)->orWhere('type',2)->orderBy('id', 'desc')->paginate(5);
        $questions_free = Question::with('category')->whereHas('category', function ($query) use ($name) {
            $query->where('name', 'LIKE', "%$name%");
        })->where('type', 0)
            ->orderBy('id', 'desc')->paginate(5);
        $best_lawyers = $best_lawyers = Lawyer::with('feedbacks')->take(4)->get()->sortByDesc(function ($query) {
            return $query->feedbacks->count();
        });
        $lawyers = Lawyer::whereHas('categories', function ($query) use ($name){
            $query->where('name', 'LIKE', "%$name%")->orWhereHas('parent', function ($query) use ($name){
                $query->where('name', 'LIKE', "%$name%");
            });
        })->get();
        $categories = Category::where('category_id', null)->get();
        return view('category.show')
            ->withCategory($category)
            ->withCat1($cat1)
            ->withCat2($cat2)
            ->withBest_lawyers($best_lawyers)
            ->withQuestions($questions)
            ->withQuestions_free($questions_free)
            ->withQuestions_costly($questions_costly)
            ->withCategories($categories)
            ->withLawyers($lawyers)
            ->withSection(3);
    }

}
