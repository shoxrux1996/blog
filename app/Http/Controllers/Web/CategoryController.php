<?php

namespace yuridik\Http\Controllers\Web;
use yuridik\Http\Controllers\Controller;
use Illuminate\Http\Request;
use yuridik\Category;

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
        $categories = Category::where('category_id',null)->get();
     
     

        return view('category.index')->withCategories($categories);
    }

    public function show($name){

        $category = Category::where('name',$name)->first();
        $cat1 = Category::where('id','!=',$category->id)->orderBy('created_at','desc')->skip(0)->take(3)->get();
        $cat2 = Category::where('id','!=',$category->id)->orderBy('created_at','desc')->skip(3)->take(4)->get();

        return view('category.show')->withCategory($category)->withCat1($cat1)->withCat2($cat2);
    }
}
