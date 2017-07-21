<?php

namespace yuridik\Http\Controllers\Admin;
use yuridik\Http\Controllers\Controller;

use Illuminate\Http\Request;
use yuridik\Document;
use Session;
class AdminDocumentController extends Controller
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
    public function showDocumentList(){

        $documents=Blog::orderBy('id', 'desc')->paginate(10);
      
        return view('document.list')->with('documents', $documents);
    }
    public function destroy($id)
    {
        $blog = Blog::find($id);
        $tags= $blog->tags()->detach();

        $blog->delete();
       Session::flash('message', 'Blog was deleted successfully');
      return redirect()->route('admin.blogs');
    }
      public function store(Request $request)
    {
               $this->validate($request, array(
            'title' => 'required|max:255',
            'text' => 'required|min:10'));
                dd($request->tags);

        $blog = new Blog;
        $blog->title= $request->title;
        $blog->text= $request->text;
        $blog->likes= $request->likes;
        $blog->dislikes= $request->dislikes;
        $blog->author_id = $request->author_id;
        $blog->save();
               $blog->tags()->sync($request->tags, false);
Session::flash('message', 'Blog was inserted successfully');
      return redirect()->route('admin.blogs');
    }
   public function insertform(){
        $tags=Tag::all();
        return view('blogs.blog_create')->withTags($tags);
    }
 public function edit(Request $request, $id)
    {
       $this->validate($request, array(
            'title' => 'required|max:255',
            'text' => 'required|min:10'));
        $blog = Blog::find($id);
        $blog->title= $request->title;
        $blog->text= $request->text;
        $blog->likes= $request->likes;
        $blog->save();

        $blog->tags()->sync($request->tags);
       Session::flash('message', 'Blog was updated successfully');
      return redirect()->route('admin.blogs');
    }
    public function editform($id){
        $blog = Blog::find($id);

        $tags = Tag::all();

        $tags2 = array();

        foreach ($tags as $tag) {
          $tags2[$tag->id] = $tag->name;
        }
        return view('blogs.blog_edit')->withBlog($blog)->with('tags', $tags2);
    }
     public function show($id){
        $blog = Blog::find($id);

        $tags = Tag::all();

        $tags2 = array();

        foreach ($tags as $tag) {
          $tags2[$tag->id] = $tag->name;
        }
        return view('blogs.blog_show')->withBlog($blog)->withTags($tags2);
    }
  
}
