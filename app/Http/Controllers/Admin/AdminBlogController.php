<?php

namespace yuridik\Http\Controllers\Admin;
use yuridik\Http\Controllers\Controller;

use Illuminate\Http\Request;
use yuridik\Blog;
use yuridik\Tag;
use Session;
class AdminBlogController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function showBlogList(){

        $blogs=Blog::orderBy('id', 'desc')->paginate(12);
      
        return view('admin.bloglist')->with('blogs', $blogs);
    }
    public function destroy($id)
    {
        $blog = Blog::find($id);
        $tags= $blog->tags()->detach();

        $blog->delete();
       Session::flash('message', 'Blog was deleted successfully');
      return redirect()->route('admin.blogs');
    }
    public function show($id){
        $blog = Blog::find($id);

        $tags = Tag::all();

        $tags2 = array();

        foreach ($tags as $tag) {
            $tags2[$tag->id] = $tag->name;
        }
        return view('admin.blog_show')->withBlog($blog)->withTags($tags2);
    }

 public function edit(Request $request, $id)
    {
       $this->validate($request, array(
            'title' => 'required|max:255',
            'text' => 'required|min:10'));
        $blog = Blog::find($id);
        $blog->title= $request->title;
        $blog->text = $request->text;
        $blog->save();

        $blog->tags()->sync($request->tags);
       Session::flash('message', 'Blog was updated successfully');
      return redirect()->route('admin.blog.edit', $blog->id);
    }
    public function editform($id){
        $blog = Blog::find($id);

        $tags = Tag::all();

        $tags2 = array();

        foreach ($tags as $tag) {
          $tags2[$tag->id] = $tag->name;
        }
        return view('admin.blog_edit')->withBlog($blog)->with('tags', $tags2);
    }

  
}
