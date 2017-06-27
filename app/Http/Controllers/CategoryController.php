<?php

namespace yuridik\Http\Controllers;

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
        $categories = Category::where('category_id', null)->get();
     
     

        return view('category.index')->withCategories($categories);
    }
    
    public function show($name){
        
        $category = Category::where('name', $name)->first();
        foreach ($category->lawyers as $law){
          echo $law->email;
      }
    }
        /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $cat= array('' => null);
        foreach ($categories as $key) {
            $cat[$key->id] = $key->name;
        }
        return view('category.insert')->withCategories($cat);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
           'name' => 'required|unique:categories'
        ]);

        $category = new Category;
        $category->name = $request->name;
        $category->category_id =$request->parent;
        $category->save();
        return redirect()->route('category.info');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

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
