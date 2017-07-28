<?php

namespace yuridik\Http\Controllers\Lawyer;
use yuridik\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;
use yuridik\Blog;
use yuridik\Tag;
use yuridik\Http\Requests;
use Session;

class LawyerBlogController extends Controller
{
    public function __construct(){
        $this->middleware('auth:lawyer');
    }
    
    public function store(Request $request)
    {
               $this->validate($request, array(
            'title' => 'required|max:200',
            'text' => 'required|min:10'));

        $blog = new Blog;
        $blog->title= $request->title;
        $blog->text= $request->text;
        $blog->likes= $request->likes;
        $blog->dislikes= $request->dislikes;
        $lawyer = Auth::guard('lawyer')->user();
        $blog->lawyer_id = $lawyer->id;
        $blog->save();
        $blog->tags()->sync($request->tags, false);

        Session::flash('message', 'Blog was inserted successfully');

      return redirect()->route('web.blogs');
    }
    public function insertform(){
        $tags=Tag::all();
        return view('blogs.blog_create')->withTags($tags);
    }

     
}
