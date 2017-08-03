<?php

namespace yuridik\Http\Controllers\Web;

use Illuminate\Http\Request;
use yuridik\Document;
use yuridik\Http\Controllers\Controller;
use yuridik\Lawyer;
use yuridik\Question;

class SearchController extends Controller
{
    public function searchAll(Request $request){

        if($request->search != "") {
            $lawyers = Lawyer::with('user')->whereHas('user', function ($query) use ($request) {
                $query->where('firstName', 'LIKE', "%$request->search%")
                    ->orWhere('lastName', 'LIKE', "%$request->search%");
            })->orWhere('email', 'LIKE', "%$request->search%")->paginate(8);

            $questions = Question::with('category')->whereHas('category', function ($query) use ($request) {
                $query->where('name', 'LIKE', "%$request->search%");
            })->orWhere('title', 'LIKE', "%$request->search%")
                ->orWhere('text', 'LIKE', "%$request->search%")->paginate(8);
            $documents = Document::with('category')->whereHas('category', function ($query) use ($request) {
                $query->where('name', 'LIKE', "%$request->search%");
            })->orWhere('title', 'LIKE', "%$request->search%")
                ->orWhere('description', 'LIKE', "%$request->search%")->paginate(8);
            $best_lawyers = Lawyer::with('feedbacks')->take(4)->get()->sortBy(function ($query){
                return $query->feedbacks->count();
            });
            dd($best_lawyers);
            return view('main-search')->withLawyers($lawyers)->withQuestions($questions)->withDocuments($documents)->withBest_lawyers($best_lawyers);
        }
        else{
            echo "nothing";
        }

    }
}
