<?php

namespace yuridik\Http\Controllers\Admin;
use Carbon\Carbon;
use yuridik\Answer;
use yuridik\Comment;
use yuridik\Document;
use yuridik\Http\Controllers\Controller;
use yuridik\Admin;
use Illuminate\Http\Request;
use yuridik\Client;
use yuridik\Lawyer;
use yuridik\Question;

class AdminPostController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth:admin');

    }
    public function questions()
    {
        $questions = Question::orderBy('id', 'desc')->paginate(10);
        return view('question.admin-index')->withQuestions($questions);
    }
    public function questionShow($id)
    {
        $question = Question::findOrFail($id);
        return view('question.admin_show')->withQuestion($question);
    }
    public function questionDeny($id){
        $question = Question::findOrFail($id);

        $question->delete();
        return redirect()->route('admin.questions.index');
    }
    public function documents()
    {
        $questions = Document::orderBy('id', 'desc')->paginate(10);
        return view('document.admin-index')->withDocuments($questions);
    }
    public function documentShow($id)
    {
        $question = Document::findOrFail($id);
        return view('document.admin_show')->withDocument($question);
    }
    public function documentDeny($id){
        $question = Document::findOrFail($id);
        $question->delete();
        return redirect()->route('admin.documents.index');
    }

    public function answers(){
        $answers = Answer::orderBy('id','desc')->paginate(10);
        return view('answer.admin-list')->withAnswers($answers);
    }
    public function answerShow($id){

        return view('answer.admin-show')->withAnswer(Answer::findOrFail($id));
    }
    public function answerDestroy($id){
        $answer = Answer::findOrFail($id);
        $answer->destroy();
    }
    public function comments(){
        $comments = Comment::orderBy('id', 'desc')->paginate(10);
        return view('comment.list')->withComments($comments);
    }

    public function commentDeny(Request $request, $id){
        $comment = Comment::findOrFail($id);
        $comment->delete();
        return redirect()->back();
    }
    public function clients(){
        $clients =Client::orderBy('id', 'desc')->paginate(8);
        $lawyers = Lawyer::orderBy('id', 'desc')->paginate(8);;
        return view('admin.users')->withClients($clients)->withLawyers($lawyers)->withSection(1);
    }
    public function lawyers(){
        $clients =Client::orderBy('id', 'desc')->paginate(8);
        $lawyers = Lawyer::orderBy('id', 'desc')->paginate(8);;
        return view('admin.users')->withClients($clients)->withLawyers($lawyers)->withSection(2);
    }
    public function clientBlock(Request $request, $id){

       $client = Client::findOrFail($id);
        $client->isBlocked = 1;

        $client->blockedTill = $request->date;
        $client->save();
        return redirect()->back();
    }
    public function clientUnblock(Request $request, $id){
        $client = Client::findOrFail($id);
        $client->isBlocked = 0;
        $client->save();
        return redirect()->back();
    }
    public function lawyerBlock(Request $request, $id){
        $lawyer = Lawyer::findOrFail($id);
        $lawyer->isBlocked = 1;
        $current = Carbon::now();
        $lawyer->blockedTill = $request->date;
        $lawyer->save();
        return redirect()->back();
    }
    public function lawyerUnblock(Request $request, $id){
        $client = Lawyer::findOrFail($id);
        $client->isBlocked = 0;
        $client->save();
        return redirect()->back();
    }

}