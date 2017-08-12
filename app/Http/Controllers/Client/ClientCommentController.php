<?php

namespace yuridik\Http\Controllers\Client;

use yuridik\Http\Controllers\Controller;
use Illuminate\Http\Request;
use yuridik\Blog;

use yuridik\Comment;
use Session;

class ClientCommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth:client');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    public function store(Request $request, $blog_id)
    {
        $this->validate($request, array(
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'comment' => 'required|min:5|max:2000'
        ));
        $blog = Blog::find($blog_id);
        $comment = new Comment;
        $comment->name = $request->name;
        $comment->email = $request->email;
        $comment->comment = $request->comment;
        $comment->approved = true;
        $comment->blog()->associate($blog);
        $comment->save();

        Session::flash('success', 'Comment was added');
        return redirect()->route('client.blog.show', ['id' => $blog_id]);
    }


}
