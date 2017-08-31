<?php

namespace yuridik\Http\Controllers\Admin;

use yuridik\Http\Controllers\Controller;

use Illuminate\Http\Request;
use yuridik\Blog;
use yuridik\Tag;
use Session;
use yuridik\File;
use Illuminate\Support\Facades\File as LaraFile;
use Purifier;
use Auth;

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
    public function showBlogList()
    {

        $blogs = Blog::orderBy('id', 'desc')->paginate(12);

        return view('admin.bloglist')->with('blogs', $blogs);
    }

    public function destroy($id)
    {
        $blog = Blog::find($id);
        $tags = $blog->tags()->detach();

        $blog->delete();
        Session::flash('message', 'Blog was deleted successfully');
        return redirect()->route('admin.blogs');
    }

    public function show($id)
    {
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
            'text' => 'required|min:10',
            'image' => 'image',
        ));
        $blog = Blog::find($id);
        $blog->title = $request->title;
        $blog->text = Purifier::clean($request->text);
        $blog->save();

        $blog->tags()->sync($request->tags);
        if ($request->file('image') != null) {
            $file = $request->file('image');
            $file_name = $file->getClientOriginalName();
            $upload_folder = '/blogs/' . $blog->id . '/';
            if ($blog->file != null) {
                LaraFile::delete(public_path() . $upload_folder . $blog->file->file);
                $blog->file->file = $file_name;
                $blog->file->path = $upload_folder;
            } else {
                $fil = new File;
                $fil->file = $file_name;
                $fil->path = $upload_folder;
                $blog->file()->save($fil);
            }
            $file->move(public_path() . $upload_folder, $file_name);
        }
        Session::flash('message', 'Blog was updated successfully');
        return redirect()->route('admin.blog.show', $blog->id);
    }

    public function editform($id)
    {
        $blog = Blog::find($id);

        $tags = Tag::all();

        $tags2 = array();

        foreach ($tags as $tag) {
            $tags2[$tag->id] = $tag->name;
        }
        return view('admin.blog_edit')->withBlog($blog)->with('tags', $tags2);
    }

    public function store(Request $request)
    {
        $this->validate($request, array(
            'title' => 'required|max:200',
            'text' => 'required|min:10',
            'image' => 'required|image',
        ));

        $blog = new Blog;
        $blog->title = $request->title;
        $blog->text = Purifier::clean($request->text);
        $lawyer = Auth::guard('admin')->user();
        $lawyer->blogs()->save($blog);

        $blog->tags()->sync($request->tags, false);

        if ($request->file('image') != null) {
            $file = $request->file('image');
            $file_name = $file->getClientOriginalName();
            $upload_folder = '/moderator_blogs/' . $blog->id . '/';

            $fil = new File;
            $fil->file = $file_name;
            $fil->path = $upload_folder;
            $blog->file()->save($fil);

            $file->move(public_path() . $upload_folder, $file_name);
        }
        Session::flash('message', 'Blog was inserted successfully');

        return redirect()->route('web.blogs');
    }
    public function insertform()
    {
        $tags = Tag::all();
        return view('admin.blog_create')->withTags($tags);
    }

}
