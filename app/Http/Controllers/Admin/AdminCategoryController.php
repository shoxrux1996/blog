<?php

namespace yuridik\Http\Controllers\Admin;
use yuridik\Http\Controllers\Controller;


use Illuminate\Http\Request;
use yuridik\Category;

class AdminCategoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $categories = Category::where('category_id', null)->get();
        return view('category.admin-index')->withCategories($categories);
    }

    public function create()
    {
        $categories = Category::all();
        $cat= array('' => null);
        foreach ($categories as $key) {
            $cat[$key->id] = $key->name;
        }
        return view('category.insert')->withCategories($cat);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
           'name' => 'required|unique:categories'
        ]);

        $category = new Category;
        $category->name = $request->name;
        $category->text = $request->text;
        $category->category_id =$request->parent;
        $category->save();
        return redirect()->route('admin.category.info');
    }
    public function destroy($id)
    {
        $category = Category::find($id);
        foreach ($category->children as $key) {
            $key->category_id = $category->category_id;
            $key->save();
        }
        $category->lawyers()->detach();
        $category->delete();  
                
     return redirect()->route('category.info');
    }

}