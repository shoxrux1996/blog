<?php

namespace yuridik\Http\Controllers\Web;

use Illuminate\Http\Request;
use yuridik\Blog;
use yuridik\Document;
use yuridik\Http\Controllers\Controller;
use yuridik\Lawyer;
use yuridik\Question;
use yuridik\Category;
use yuridik\City;


class SearchController extends Controller
{
    public function searchAll(Request $request)
    {

        $best_lawyers = Lawyer::where('type', 2)->with('feedbacks')
            ->take(4)->get()->sortByDesc(function ($query) {
            return $query->feedbacks->count();
        });
        if ($request->search != "") {
            $lawyers = Lawyer::where('type', 2)
                ->with('user')
                ->whereHas('user', function ($query) use ($request) {
                $query->where('firstName', 'LIKE', "%$request->search%")
                    ->orWhere('lastName', 'LIKE', "%$request->search%");
            })->orWhere('email', 'LIKE', "%$request->search%")
                ->orderBy('created_at', 'desc')->paginate(8,['*'], 'lawyers');

            $questions = Question::with('category')
                ->whereHas('category', function ($query) use ($request) {
                $query->where('name', 'LIKE', "%$request->search%");
            })->orWhere('title', 'LIKE', "%$request->search%")
                ->orWhere('text', 'LIKE', "%$request->search%")
                ->orderBy('created_at', 'desc')
                ->paginate(8,['*'], 'questions');

            $blogs = Blog::where('title', 'LIKE', "%$request->search%")
                ->orWhere('text', 'LIKE', "%$request->search%")
                ->orderBy('count', 'desc')
                ->paginate(8,['*'], 'blogs');
            return view('main-search')
                ->withLawyers($lawyers)
                ->withQuestions($questions)
                ->withBlogs($blogs)
                ->withBest_lawyers($best_lawyers);
        } else {
            $lawyers = Lawyer::where('type', 2)
                ->where('isBlocked', 0)
                ->paginate(4,['*'], 'lawyers');
            $questions = Question::orderBy('created_at', 'desc')
                ->paginate(4,['*'], 'questions');
            $blogs = Blog::orderBy('count','desc')
                ->paginate(4,['*'],'blogs');
            return view('main-search')->withLawyers($lawyers)
                ->withQuestions($questions)
                ->withBest_lawyers($best_lawyers)
                ->withBlogs($blogs);
        }

    }

    public function searchLawyers(Request $request)
    {
        if ($request->search != null) {

            $search = explode(' ', $request->search);
            $lawyers = Lawyer::where('type', 2)->with('user', 'categories')->whereHas('user', function ($query) use ($search) {
                foreach ($search as $value) {
                    $query->where('firstName', 'LIKE', "%$value%")
                        ->orWhere('lastName', 'LIKE', "%$value%");
                }
            })->orWhereHas('categories', function ($query) use ($search) {
                foreach ($search as $value) {
                    $query->where('name', 'LIKE', "%$value%");
                }
            })->paginate(8);

        }
        if ($request->city != null) {
            $lawyers = Lawyer::where('type', 2)->with('user')
                ->whereHas('user', function ($query) use ($request) {
                    $query->with('city')->whereHas('city', function ($query) use ($request) {
                        $query->where('name', 'LIKE', "%$request->city%");
                    });
                })->paginate(8);

        }
        if ($request->search == null && $request->city == null) {
            $lawyers = Lawyer::where('type', 2)->orderBy('id', 'desc')->paginate(8);
        }

        $categories = Category::where('category_id', null)->get();
        $cities = City::orderBy('id', 'asc')->get();
        $best_lawyers = $best_lawyers = Lawyer::where('type', 2)->with('feedbacks')->take(4)->get()->sortByDesc(function ($query) {
            $query->feedbacks->count();
        });

        return view('lawyer.list')->withLawyers($lawyers)
            ->withCategories($categories)->withCities($cities)
            ->withBest_lawyers($best_lawyers);

    }

    public function searchByCategory($name)
    {
        $lawyers = Lawyer::where('type', 2)->with('categories')->whereHas('categories', function ($query) use ($name) {
            $query->where('name', 'LIKE', "%$name%");
        })->paginate(8);

        $categories = Category::where('category_id', null)->get();
        $cities = City::orderBy('id', 'asc')->get();
        $best_lawyers = $best_lawyers = Lawyer::where('type', 2)->with('feedbacks')->take(4)->get()->sortByDesc(function ($query) {
            $query->feedbacks->count();
        });
        return view('lawyer.list')->withLawyers($lawyers)
            ->withCategories($categories)->withCities($cities)
            ->withBest_lawyers($best_lawyers);
    }

    public function searchQuestionsByCategory(Request $request)
    {
        $name = $request->name;
        $questions = Question::with('category', 'client')
            ->whereHas('category', function ($query) use ($name) {
                $query->where('name', 'LIKE', "%$name%");
            })->orWhereHas('client', function ($query) use ($name) {
                $query->with('user')->whereHas('user', function ($query) use ($name) {
                    $query->where('firstName', 'LIKE', "%$name%")->orWhere('lastName', 'LIKE', "%$name%");
                });
            })->orWhere('title', 'LIKE', "%$name%")
            ->orWhere('text', 'LIKE', "%$name%")->orderBy('id', 'desc')
            ->paginate(5, ['*'], 'all');

        $questions_costly = Question::with('category', 'client')
            ->whereHas('category', function ($query) use ($name) {
                $query->where('name', 'LIKE', "%$name%");
            })->orWhereHas('client', function ($query) use ($name) {
                $query->with('user')->whereHas('user', function ($query) use ($name) {
                    $query->where('firstName', 'LIKE', "%$name%")->orWhere('lastName', 'LIKE', "%$name%");
                });
            })->orWhere('title', 'LIKE', "%$name%")
            ->orWhere('text', 'LIKE', "%$name%")->orderBy('id', 'desc')
            ->where('type', 1)->orWhere('type', 2)
            ->orderBy('id', 'desc')->paginate(5, ['*'], 'costly');

        $questions_free = Question::with('category', 'client')
            ->whereHas('category', function ($query) use ($name) {
                $query->where('name', 'LIKE', "%$name%");
            })->orWhereHas('client', function ($query) use ($name) {
                $query->with('user')->whereHas('user', function ($query) use ($name) {
                    $query->where('firstName', 'LIKE', "%$name%")->orWhere('lastName', 'LIKE', "%$name%");
                });
            })->orWhere('title', 'LIKE', "%$name%")
            ->orWhere('text', 'LIKE', "%$name%")->orderBy('id', 'desc')
            ->where('type', 0)
            ->orderBy('id', 'desc')->paginate(5, ['*'], 'free');
        $best_lawyers = Lawyer::where('type', 2)->with('feedbacks')->take(4)->get()->sortByDesc(function ($query) {
            return $query->feedbacks->count();
        });
        $categories = Category::where('category_id', null)->get();

        return view('question.list')
            ->withBest_lawyers($best_lawyers)
            ->withQuestions($questions)
            ->withQuestions_free($questions_free)
            ->withQuestions_costly($questions_costly)
            ->withCategories($categories)

            ->withSection(1);
    }

}
