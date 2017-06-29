<?php

namespace yuridik\Http\Controllers;

use Illuminate\Http\Request;
use yuridik\Lawyer;
use yuridik\Category;
use yuridik\Client;
class LawyersInfoController extends Controller
{
    public function showLawyersList(){
    	 $categories = Category::where('category_id', null)->get();
    	 $lawyers = Lawyer::paginate(10);

    	return view('lawyer.list')->withLawyers($lawyers)->withCategories($categories);

    }
}
