<?php

namespace yuridik\Http\Controllers\Admin;

use Carbon\Carbon;
use yuridik\Answer;
use yuridik\Category;
use yuridik\Comment;
use yuridik\Document;
use yuridik\Http\Controllers\Controller;
use yuridik\Admin;
use Illuminate\Http\Request;
use yuridik\Client;
use yuridik\Lawyer;
use yuridik\Question;
use Validator;

use Illuminate\Support\Facades\Auth;

class AdminPostController extends Controller
{

    public function __construct()
    {
        return $this->middleware('auth:admin');

    }

    public function questions()
    {
        Auth::guard('admin')->user()->questionNotifications()->delete();
        $questions = Question::orderBy('id', 'desc')->paginate(10);
        return view('question.admin-index')->withQuestions($questions);
    }

    public function questionShow($id)
    {
        $question = Question::findOrFail($id);
        return view('question.admin_show')->withQuestion($question);
    }

    public function questionDeny($id)
    {
        $question = Question::findOrFail($id);

        $question->delete();
        return redirect()->route('admin.questions.index');
    }
    public function questionEdit($id){
        $question = Question::findOrFail($id);
        $category = Category::where('category_id',null)->get();
        $categories = array();
        foreach ($category as $key) {
            $categories[$key->id] = $key->name;
        }
        return view('admin.question_edit')->withQuestion($question)->withCategories($categories);
    }
    public function questionUpdate(Request $request, $id){
        $messages = [
            'required' => 'Обязательно к заполнению',
            'string' => 'Неправильный формат',
            'title.min' => 'Минимум 3 символов',
            'description.min' => 'Минимум 10 символов',
        ];
        $rules = array(
            'title' => 'required|string|min:3',
            'description' => 'required|string|min:10',
            'category' => 'required',
        );

        Validator::make($request->all(), $rules, $messages)->validate();
        $question = Question::findOrFail($id);
        $question->title = $request->title;
        $question->text = $request->description;
        $question->category_id = $request->category;
        $question->save();
        return redirect()->route('admin.question.show', $id);
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
    public function documentDeny($id)
    {
        $question = Document::findOrFail($id);
        $question->delete();
        return redirect()->route('admin.documents.index');
    }

    public function answers()
    {
        $answers = Answer::orderBy('id', 'desc')->paginate(10);
        return view('answer.admin-list')->withAnswers($answers);
    }
    public function answerShow($id)
    {

        return view('answer.admin-show')->withAnswer(Answer::findOrFail($id));
    }
    public function answerDestroy($id)
    {
        $answer = Answer::findOrFail($id);
        $answer->delete();
        return redirect()->back();
    }

    public function comments()
    {
        Auth::guard('admin')->user()->commentNotifications()->delete();
        $comments = Comment::orderBy('id', 'desc')->paginate(10);
        return view('comment.list')->withComments($comments);
    }
    public function commentDeny(Request $request, $id)
    {
        $comment = Comment::findOrFail($id);
        $comment->delete();
        return redirect()->back();
    }

    public function clients()
    {

        $clients = Client::orderBy('id', 'desc')->paginate(8);
        $lawyers = Lawyer::orderBy('id', 'desc')->paginate(8);;
        return view('admin.users')->withClients($clients)->withLawyers($lawyers)->withSection(1);
    }
    public function lawyers()
    {
        Auth::guard('admin')->user()->userNotifications()->delete();
        $clients = Client::orderBy('id', 'desc')->paginate(8);
        $lawyers = Lawyer::orderBy('id', 'desc')->paginate(8);;
        return view('admin.users')->withClients($clients)->withLawyers($lawyers)->withSection(2);
    }

    public function clientBlock(Request $request, $id)
    {

        $client = Client::findOrFail($id);
        $client->isBlocked = 1;

        $client->blockedTill = $request->date;
        $client->save();
        return redirect()->back();
    }
    public function clientUnblock(Request $request, $id)
    {
        $client = Client::findOrFail($id);
        $client->isBlocked = 0;
        $client->save();
        return redirect()->back();
    }

    public function lawyerBlock(Request $request, $id)
    {
        $lawyer = Lawyer::findOrFail($id);
        $lawyer->isBlocked = 1;
        $current = Carbon::now();
        $lawyer->blockedTill = $request->date;
        $lawyer->save();
        return redirect()->back();
    }

    public function lawyerUnblock(Request $request, $id)
    {
        $client = Lawyer::findOrFail($id);
        $client->isBlocked = 0;
        $client->save();
        return redirect()->back();
    }
    public function lawyerConfirm(Request $request, $id)
    {
        $lawyer = Lawyer::findOrFail($id);
        if($lawyer->type==1)
            $lawyer->type = 2;
        else
            $lawyer->type = 1;
        $lawyer->save();
        return redirect()->back();
    }

}