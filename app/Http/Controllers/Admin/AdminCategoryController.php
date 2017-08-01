<?php

namespace yuridik\Http\Controllers\Admin;
use yuridik\Http\Controllers\Controller;
use Illuminate\Support\Collection;
use Illuminate\Http\Request;
use yuridik\Category;
use yuridik\Blog;
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
        return view('admin.category_insert')->withCategories($cat);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
           'name' => 'required|unique:categories',
            'text' => 'required|min:10',
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
    public function show($id){
        $category = Category::findOrFail($id);
        $cat1 = Category::where('id','!=',$id)->orderBy('created_at','desc')->skip(0)->take(3)->get();
        $cat2 = Category::where('id','!=',$id)->orderBy('created_at','desc')->skip(3)->take(4)->get();

        return view('admin.category_show')->withCategory($category)->withCat1($cat1)->withCat2($cat2);
    }
    public function edit($id)
    {
        $category = Category::findOrFail($id);

        $categories = Category::all();
        $cat= array('' => null);
        foreach ($categories as $key) {
            $cat[$key->id] = $key->name;
        }
        return view('admin.category_edit')->withCategory($category)->withCategories($cat);
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|unique:categories,name,'.$id,
            'text' => 'required|min:10',
        ]);

        $category = Category::findOrFail($id);
        $category->name = $request->name;
        $category->category_id =$request->category;
        $category->text = $request->text;
        $category->save();
        return redirect()->route('admin.category.show', $id);
    }
}
