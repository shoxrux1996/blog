<?php

namespace yuridik\Http\Controllers\Lawyer;

use Illuminate\Support\Facades\Notification;
use yuridik\Admin;
use yuridik\Http\Controllers\Controller;
use Illuminate\Http\Request;
use yuridik\Blog;
use yuridik\Notifications\CommentsNotification;
use yuridik\Tag;
use yuridik\Comment;
use Session;
use Auth;

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


    public function store(Request $request, $blog_id)
    {
        $this->validate($request, array(
            'comment' => 'required|min:5|max:2000'
        ));
        $blog = Blog::find($blog_id);

        $lawyer = Auth::guard('lawyer')->user();
        $comment = new Comment;
        $comment->comment = $request->comment;
        $comment->approved = true;
        $comment->blog()->associate($blog);
        $lawyer->comments()->save($comment);

        Session::flash('success', 'Comment was added');
        $lawyers = Lawyer::where('type', 2)->get();
        $admins = Admin::all();
        Notification::send($lawyers, new CommentsNotification($comment));
        Notification::send($admins, new CommentsNotification($comment));

        return redirect()->route('web.blog.show', ['id' => $blog_id]);
    }

}
