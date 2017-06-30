<?php

namespace yuridik\Http\Controllers\Web;
use yuridik\Http\Controllers\Controller;
use Illuminate\Http\Request;
use yuridik\Lawyer;
use yuridik\Category;
use yuridik\Client;
use yuridik\City;
class LawyersInfoController extends Controller
{
    public function showLawyersList(){
    	 $categories = Category::where('category_id', null)->get();
    	 $lawyers = Lawyer::paginate(10);
    	 $cities = City::all();

    	return view('lawyer.list')->withLawyers($lawyers)->withCategories($categories)->withCities($cities);

    }
}
