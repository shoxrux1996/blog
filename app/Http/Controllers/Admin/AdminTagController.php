<?php

namespace yuridik\Http\Controllers\Admin;

use yuridik\Http\Controllers\Controller;
use Illuminate\Http\Request;
use yuridik\Blog;
use yuridik\Tag;
use Session;

class AdminTagController extends Controller
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

    public function insertForm()
    {
        return view('tag.insert');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $tag = Tag::find($id);

        return view('tag.show')->withTag($tag);
    }

    public function taglist()
    {

        $tags = Tag::all();

        return view('tag.list')->withTags($tags);
    }

    public function edit($id)
    {

        $tag = Tag::find($id);

        return view('tag.edit')->withTag($tag);
    }

    public function update(Request $request, $id)
    {
        $tag = Tag::find($id);
        $this->validate($request, ['name' => 'required']);
        $tag->name = $request->name;

        $tag->save();
        Session::flash('message', 'Successfully saved your new tag');
        return redirect()->route('admin.tags.index');
    }

    public function destroy($id)
    {
        $tag = Tag::find($id);
        $tag->blogs()->detach();

        $tag->delete();
        Session::flash('message', 'Tag was deleted successfully');
        return redirect()->route('admin.tags.index');
    }

    public function insert(Request $request)
    {
        $this->validate($request, ['name' => 'required']);
        $tag = new Tag;
        $tag->name = $request->name;
        $tag->save();
        Session::flash('message', 'Tag was created successfully');
        return redirect()->route('admin.tags.index');
    }


}