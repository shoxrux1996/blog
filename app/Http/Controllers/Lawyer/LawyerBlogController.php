<?php

namespace yuridik\Http\Controllers\Lawyer;

use yuridik\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;
use yuridik\Blog;
use yuridik\Tag;
use yuridik\Http\Requests;
use Session;
use yuridik\File;
use Purifier;
use Illuminate\Support\Facades\File as LaraFile;

class LawyerBlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:lawyer');
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
        $lawyer = Auth::guard('lawyer')->user();
        $lawyer->blogs()->save($blog);

        $blog->tags()->sync($request->tags, false);

        if ($request->file('image') != null) {
            $file = $request->file('image');
            $file_name = $file->getClientOriginalName();
            $upload_folder = '/blogs/' . $blog->id . '/';

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
        return view('blog.blog_create')->withTags($tags);
    }

    public function edit(Request $request, $id)
    {
        $this->validate($request, array(
            'title' => 'required|max:255',
            'text' => 'required|min:10',
            'image' => 'image',
        ));
        $blog = Blog::find($id);
        $blog->text = Purifier::clean($request->text);
        $blog->title = $request->title;
        $blog->save();

        $blog->tags()->sync($request->tags);
        if ($request->file('image') != null) {
            $file = $request->file('image');
            $file_name = $file->getClientOriginalName();
            $upload_folder = '/blogs/' . $blog->id . '/';
            if ($blog->file != null) {
                LaraFile::delete(public_path() . $blog->file->path. $blog->file->file);
                $blog->file->file = $file_name;
                $blog->file->path = $upload_folder;
                $blog->file->save();
            } else {
                $fil = new File;
                $fil->file = $file_name;
                $fil->path = $upload_folder;
                $blog->file()->save($fil);
            }
            $file->move(public_path() . $upload_folder, $file_name);
        }
        Session::flash('message', 'Blog was updated successfully');
        return redirect()->route('web.blog.show', $blog->id);
    }

    public function editform($id)
    {
        $blog = Blog::find($id);

        $tags = Tag::all();

        $tags2 = array();

        foreach ($tags as $tag) {
            $tags2[$tag->id] = $tag->name;
        }
        return view('blog.blog_edit')->withBlog($blog)->with('tags', $tags2);
    }

}
