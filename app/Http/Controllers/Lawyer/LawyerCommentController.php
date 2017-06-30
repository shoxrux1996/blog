<?php

namespace yuridik\Http\Controllers\Lawyer;
use yuridik\Http\Controllers\Controller;
use Illuminate\Http\Request;
use yuridik\Blog;
use yuridik\Tag;
use yuridik\Comment;
use Session;
class LawyerCommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response

     */

     public function __construct()
    {
        $this->middleware('auth:lawyer');
    }
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $blog_id)
    {   
        $this->validate($request, array(
            'comment' => 'required|min:5|max:2000'
            ));
        $blog = Blog::find($blog_id);
        $comment = new Comment;
        $comment->comment = $request->comment;
        $comment->approved =true;
        $comment->blog()->associate($blog);
        $comment->save();
        
        Session::flash('success', 'Comment was added');
        return redirect()->route('admin.blog.show', ['id' => $blog_id]);
    }

}
