<?php

namespace yuridik\Http\Controllers\Lawyer;

use Illuminate\Support\Facades\Notification;
use yuridik\Admin;
use yuridik\Client;
use yuridik\Http\Controllers\Controller;
use Illuminate\Http\Request;

use yuridik\Notifications\AnswerNotification;
use yuridik\Question;
use yuridik\Answer;
use Session;
use Auth;
use Validator;
use yuridik\File;
use Purifier;

class LawyerAnswerController extends Controller
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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $question_id)
    {

        $rules = array(
            'text' => 'required|min:5|max:10000'
        );
        $count = count($request->file('files')) - 1;

        foreach (range(0, $count) as $i) {
            $rules['files.' . $i] = 'mimes:doc,docx,pdf|max:3000';
        }
        Validator::make($request->all(), $rules)->validate();


        $question = Question::find($question_id);
        $lawyer = Auth::guard('lawyer')->user();

        $answer = new Answer;
        $answer->text = Purifier::clean($request->text);
        $answer->lawyer_id = $lawyer->id;
        $question->answers()->save($answer);

        if ($request->file('files') != null) {
            $file = $request->file('files');
            foreach ($file as $key) {
                $fil = new File;
                $fil->file = $key->getClientOriginalName();
                $upload_folder = '/answers/' . time() . '/';
                $fil->path = $upload_folder;
                $answer->files()->save($fil);
                $key->move(public_path() . $upload_folder, $key->getClientOriginalName());
            }
        }
        $client = Client::findOrFail($question->client_id);
        $admins = Admin::all();
        Notification::send($client, new AnswerNotification($answer));
        Notification::send($admins, new AnswerNotification($answer));
        // $comment->blog()->associate($blog);
        Session::flash('success', 'Answer was added');
        return redirect()->route('web.question.show', ['id' => $question_id]);

    }

    public function myAnswers()
    {
        $id = array();
        foreach (Auth::user()->answers->unique('question_id') as $answer) {
            array_push($id, $answer->question->id);
        }
        $questions = Question::where('id', $id)->orderBy('id', 'desc')->paginate(5);
        return view('question.list')->withQuestions($questions);
    }
}