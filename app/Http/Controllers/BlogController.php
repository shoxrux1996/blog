<?php

namespace yuridik\Http\Controllers;

use Illuminate\Http\Request;
use yuridik\Blog;
use yuridik\Tag;
use yuridik\Http\Requests;
use yuridik\Http\Controllers\Controller;

class BlogController extends Controller
{
    public function __construct(){
//this->middleware('Second');

    }
     public function insertform(){
        return view('blogs.blog_create');
    }
    public function store(Request $request)
    {
        $blog = new Blog;
        $blog->title= $request->title;
        $blog->text= $request->text;
        $blog->likes= $request->likes;
        $blog->dislikes= $request->dislikes;
        $blog->author_id = $request->author_id;
        $blog->save();    
        echo 'Success';
    }
    public function blog_list(){
       $blogs= Blog::all();
	    return view('bloglist')->with('blogs', $blogs);
	}
   
    public function destroy($id)
    {
        $blog = Blog::find($id);
        $blog->delete();
         echo 'Success';
    }
    public function edit(Request $request, $id)
    {
        $blog = Blog::find($id);
        $blog->title= $request->title;
        $blog->text= $request->text;
        $blog->likes= $request->likes;
        $blog->save();
        echo 'Success';
    }
    public function show($id){
        $blogs = Blog::find($id);
        $tags = Tag::all();
        return view('blog_show')->with('blogs', $blogs)->with('tags', $tags);
    }

}
