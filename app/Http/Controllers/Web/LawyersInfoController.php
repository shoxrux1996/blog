<?php

namespace yuridik\Http\Controllers\Web;

use yuridik\Http\Controllers\Controller;
use Illuminate\Http\Request;
use yuridik\Lawyer;
use yuridik\Category;
use yuridik\Client;
use yuridik\City;
use yuridik\User;

class LawyersInfoController extends Controller
{
    public function showLawyersList()
    {
        $categories = Category::where('category_id', null)->get();
        $lawyers = Lawyer::orderBy('id', 'desc')->paginate(8);
        $best_lawyers = $best_lawyers = Lawyer::with('feedbacks')->take(4)->get()->sortByDesc(function ($query) {
            return $query->feedbacks->count();
        });
        $cities = City::orderBy('id', 'asc')->get();

        return view('lawyer.list')->withLawyers($lawyers)
            ->withCategories($categories)->withCities($cities)
            ->withBest_lawyers($best_lawyers);
    }

    public function show($id)
    {
        $lawyer = Lawyer::findOrFail($id);

        return view('lawyer.show')->withLawyer($lawyer);
    }

}
