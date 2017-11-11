<?php

namespace yuridik\Http\Controllers\Admin;

use Illuminate\Http\Request;
use yuridik\Answer;
use yuridik\Blog;
use yuridik\Client;
use yuridik\Comment;
use yuridik\Http\Controllers\Controller;
use yuridik\Lawyer;
use yuridik\Question;
use yuridik\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Collection;
use yuridik\Withdraw;

class AdminNotificationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function usersList(){
       $admin=Auth::guard('admin')->user();

       $ids = array();
       foreach ($admin->userNotifications as $user) {
        array_push($ids, $user->data['id']);
       }
        $users = User::whereIn('id',$ids)->get();

        $lawyers_id = new Collection();
        foreach($users as $user)
            $lawyers_id->push($user->lawyer['id']);

        $clients_id = new Collection();
        foreach($users as $user)
            $clients_id->push($user->client['id']);

        $clients = Client::whereIn('id', $clients_id)->orderBy('id')->paginate(20,['*'],'clients');
        $lawyers = Lawyer::whereIn('id', $lawyers_id)->orderBy('id')->paginate(20,['*'],'lawyers');
        $admin->userNotifications()->delete();
        return view('admin.users')->withClients($clients)->withLawyers($lawyers);

    }
    public function commentsList(){
        $admin=Auth::guard('admin')->user();
        $comment_id = new Collection();
        foreach($admin->commentNotifications as $comment)
            $comment_id->push($comment->data['id']);
        $comments = Comment::whereIn('id', $comment_id)->orderBy('id')->paginate(40);

        $admin->commentNotifications()->delete();
        return view('comment.list')->withComments($comments);
    }
    public function blogsList(){
        $admin=Auth::guard('admin')->user();
        $blog_id = new Collection();
        foreach($admin->blogNotifications as $comment)
            $blog_id->push($comment->data['id']);
        $blogs = Blog::whereIn('id', $blog_id)->orderBy('id')->paginate(40);
        $admin->blogNotifications()->delete();
        return view('admin.bloglist')->with('blogs', $blogs);
    }
    public function questionsList(){
        $admin=Auth::guard('admin')->user();
        $blog_id = new Collection();
        foreach($admin->questionNotifications as $comment)
            $blog_id->push($comment->data['id']);
        $blogs = Question::whereIn('id', $blog_id)->orderBy('id')->paginate(40);
        $admin->questionNotifications()->delete();
        return view('question.admin-index')->withQuestions($blogs);
    }
    public function answersList(){
        $admin=Auth::guard('admin')->user();
        $blog_id = new Collection();
        foreach($admin->answerNotifications as $comment)
            $blog_id->push($comment->data['id']);
        $blogs = Answer::whereIn('id', $blog_id)->orderBy('id')->paginate(40);
        $admin->answerNotifications()->delete();
        return view('answer.admin-list')->withAnswers($blogs);
    }
    public function withdrawsList(){
        $admin=Auth::guard('admin')->user();

        return redirect()->route('admin.withdraw.requests');
    }
}
