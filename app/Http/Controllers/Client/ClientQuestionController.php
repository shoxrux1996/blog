<?php

namespace yuridik\Http\Controllers\Client;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Notification;
use Illuminate\Validation\Rule;
use Mews\Purifier\Facades\Purifier;
use yuridik\Answer;
use yuridik\Fee;
use yuridik\Feedback;
use yuridik\Notifications\QuestionsNotification;

use yuridik\Http\Controllers\Controller;

use Illuminate\Http\Request;

use yuridik\Question;
use yuridik\Category;
use yuridik\File;
use yuridik\Client;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use yuridik\Order;
use yuridik\Lawyer;
use yuridik\Admin;
use yuridik\User;
use yuridik\City;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;

class ClientQuestionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:client',['except' => ['create', 'store','questionCreate','questionCreateEloquent']]);
    }

    public function create()
    {   
        $category = Category::where('category_id',null)->get();
        $clients= Client::all();
        $emails = array();
        foreach ($clients as $client) {
            array_push($emails, $client->email);
        }
        $categories = array();
        foreach ($category as $key) {
            $categories[$key->id] = $key->name;
        }
        $client = Auth::guard('client')->user();
        return view('question.create')->withCategories($categories)->withClient($client)->withEmails($emails);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        if(!Auth::guard('client')->check()){
            $cl = Client::where('email', $request->email)->first();
            if(!empty($cl)){
                if ($cl->isBlocked == 1) {
                    if ($cl->blockedTill <= Carbon::now('Asia/Tashkent')) {
                        $cl->isBlocked = 0;
                        $cl->save();
                    } 
                    else {
                        return redirect()->back()->withInput($request->only('email', 'remember'))->withErrors(['wrong-attempt' => 'Вы заблокированы']);
                    }
                }
                if ($cl->confirmed == 0) {
                    return redirect()->back()->withInput($request->only('email', 'remember'))->withErrors(['wrong-attempt' => ' Подтвердите адрес электронной почты']);
                }
                $credentials = ['email' => $request->email, 'password' => $request->password];
                if (!Auth::guard('client')->attempt($credentials, $request->remember)) {
                    return redirect()->back()->withInput($request->only('email', 'remember'))->withErrors(['wrong-attempt' => 'Неправильный email или пароль']);
                }
                $this->questionCreate($request,Auth::guard('client')->user());
                if(Session::has('question-create')) {
                    Session::reflash();   
                    return redirect()->route('client.dashboard');
                }
                elseif (Session::has('message')) {
                    Session::reflash();  
                    return redirect()->route('card.payment');
                }    
            }
            else{
                $this->validate($request, [
                    'name' => 'required',
                    'email' => 'required|string|email|max:255|unique:clients,email|unique:lawyers,email',
                    'password' => 'required|string|min:6|confirmed',
                ]);
                $confirmation_code = str_random(30);
                $user = new User;
                $user->firstName = $request['name'];
                $city = City::where('name', ' ')->first();
                if ($city != null)
                    $user->city_id = $city->id;
                else {
                    $cit = new City;
                    $cit->name = " ";
                    $cit->save();
                    $user->city_id = $cit->id;
                }

                $user->save();
                $userID = $user->id;
                $client = new Client;
                $client->email = $request['email'];
                $client->password = bcrypt($request['password']);
                $client->confirmation_code = $confirmation_code;
                $client->user_id = $userID;


                $data = array('code' => $client->confirmation_code, 'email' => $client->email, 'name' => $client->name);
                Mail::send('email.verify', ['data' => $data], function ($message) use ($data) {
                    $message->to($data['email'], $data['name'])
                        ->subject('Verify your email address');
                });
                $client->save();   

                $this->questionCreate($request,$client);
                if(Session::has('question-create')) {
                    Session::reflash();   
                    return redirect()->route('user.login');
                }
                elseif (Session::has('message')) {
                    Session::reflash();  
                    return redirect()->route('card.payment');
                }
            }
        }
        else{
            $this->questionCreate($request,Auth::guard('client')->user());
            if(Session::has('question-create')) {
                Session::reflash();   
                return redirect()->route('client.dashboard');
            }
            elseif (Session::has('message')) {
                Session::reflash();  
                return redirect()->route('card.payment');
            }
        }        
    }
    private function questionCreate(Request $request,$client)
    {
        $messages = [
            'required' => 'Обязательно к заполнению',
            'string' => 'Неправильный формат',
            'title.min' => 'Минимум 3 символов',
            'description.min' => 'Минимум 10 символов',
            'mimes' => 'Неверный формат(doc,docx,pdf)',
            'max' => 'Файл слишком велик',

        ];
        $rules = array(
            'title' => 'required|string|min:3',
            'description' => 'required|string|min:10',
            'category' => 'required',
        );
        $count = count($request->file('files')) - 1;
        foreach (range(0, $count) as $i) {
            $rules['files.' . $i] = 'mimes:doc,docx,pdf|max:3000';
        }
        Validator::make($request->all(), $rules, $messages)->validate();

        if ($request->type == 2) {
            if ($client->user->balance() >= 5000) {
                Session::flash('question-create', 'Question created successfully');
                return $this->questionCreateEloquent($request,$client,2);
            } else {
                Session::flash('message', 'Not enough money, Please charge your balance');
                return redirect()->route('card.payment');
            }
        }
        elseif ($request->type == 1) {
            if ($client->user->balance() >= 5000) {
                Session::flash('question-create', 'Question created successfully');
                return $this->questionCreateEloquent($request,$client,1);
            } else {
                Session::flash('message', 'Not enough money, Please charge your balance');
                return redirect()->route('card.payment');
            }
        }
        else {
            Session::flash('question-create', 'Question created successfully');
            return $this->questionCreateEloquent($request,$client,0);
        }
    }
    private function questionCreateEloquent(Request $request,$client,$usertype){
        $question = new Question;
        $question->title = $request->title;
        $question->text = $request->description;
        $question->category_id = $request->category;
        $question->client_id = $client->id;
        switch ($usertype) {
            case 0:
                $question->price = 0;
                $question->type = 0;
                break;
            case 1:
                $question->price = 5000;
                $question->type = 1;
                break;
            case 2:
                $question->price = 25000;
                $question->type = 2;
                if($request->disable == 1)
                    $question->disabled = 1;
                break;
        }
        $question->save();
        // is it possible?
        if ($request->file('files') != null) {
            $file = $request->file('files');
            foreach ($file as $key) {
                $fil = new File;
                $fil->file = $key->getClientOriginalName();
                $upload_folder = '/questions/' . time() . '/';
                $fil->path = $upload_folder;
                $question->files()->save($fil);
                $key->move(public_path() . $upload_folder, $key->getClientOriginalName());
            }
        }
        $lawyers = Lawyer::where('type', 2)->get();
        $admins = Admin::all();

        if($question->type != 0){
            $order = new Order;
            $order->user_id = $question->client->user->id;
            $order->amount = $question->price;
            $question->order()->save($order);
            Notification::send($lawyers, new QuestionsNotification($question));
            Notification::send($admins, new QuestionsNotification($question));
        }
        return true;
    }

    public function edit($id){
        $client = Auth::user();
        $question = Question::findOrFail($id);
        if($client->id != $question->client->id){
            return redirect()->back();
        }
        $category = Category::where('category_id',null)->get();
        $categories = array();
        foreach ($category as $key) {
            $categories[$key->id] = $key->name;
        }
        return view('question.question_edit')->withCategories($categories)->withQuestion($question);
    }
    public function update(Request $request, $id){
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
            'mimes' => 'Неверный формат(doc,docx,pdf)',
        );
        $count = count($request->file('files')) - 1;
        foreach (range(0, $count) as $i) {
            $rules['files.' . $i] = 'mimes:doc,docx,pdf|max:3000';
        }

        Validator::make($request->all(), $rules, $messages)->validate();
        $question = Question::findOrFail($id);
        $question->title = $request->title;
        $question->text = $request->description;
        $question->category_id = $request->category;

        $question->save();
        if ($request->file('files') != null) {
            $file = $request->file('files');
            foreach ($file as $key) {
                $fil = new File;
                $fil->file = $key->getClientOriginalName();
                $upload_folder = '/questions/' . time() . '/';
                $fil->path = $upload_folder;
                $question->files()->save($fil);
                $key->move(public_path() . $upload_folder, $key->getClientOriginalName());
            }
        }
        return redirect()->route('web.question.show', $question->id);
    }
    public function myQuestions()
    {
        $questions = Question::where('client_id', Auth::user()->id)->orderBy('id', 'desc')->paginate(5);
        $best_lawyers = $best_lawyers = Lawyer::with('feedbacks')->take(4)->get()->sortByDesc(function ($query) {
            return $query->feedbacks->count();
        });
        return view('client.questions')->withQuestions($questions)->withBest_lawyers($best_lawyers);
    }

    public function showQuestion($id)
    {
        $question = Auth::user()->questions->find($id);
        return view('client.question_show')->withQuestion($question);
    }

    public function answerStore(Request $request,$question_id){

        $rules = array(
            'text' => 'required|min:5|max:10000'
        );
        $count = count($request->file('files')) - 1;
        foreach (range(0, $count) as $i) {
            $rules['files.' . $i] = 'mimes:doc,docx,pdf|max:3000';
        }
        Validator::make($request->all(), $rules)->validate();
        $question = Question::find($question_id);
        $client = Auth::guard('client')->user();
        $answer = new Answer;
        $answer->text = Purifier::clean($request->text);
        $answer->question_id = $question->id;
        $client->answers()->save($answer);
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
        return redirect()->back();

    }
    public function payForLawyer(Request $request, $id){

        $rules = array();
        $lawyers = $request->lawyers;
        $answer_helped = $request->answer_helped;
        foreach ($lawyers as $key => $lawyer){
            if(!is_null($lawyer)) {
                $rules['lawyers.' . $key] = 'numeric|min:0|max:10000';
            }
            else
                unset($lawyers[$key]);
        }
        foreach ($answer_helped as $key => $answer){
            if(is_null($answer)) {
                unset($answer_helped[$key]);
            }
        }

        $validator = Validator::make(['lawyers'=>$lawyers], $rules);
        if($validator->fails()){
            return redirect()->back()->withErrors(__('validation.price'));
        }
        if(empty($lawyers) && empty($answer_helped)){
            return redirect()->back()->withErrors(__('validation.empty'));
        }
        $question = Question::findOrFail($id);
        $sum = 0;
        foreach ($lawyers as $lawyer){
            $sum = $sum + $lawyer;
        }
        if($question->price < $sum){
            return redirect()->back()->withErrors(__('validation.price'));
        }

        $client = Auth::guard('client')->user();
        foreach ($lawyers as $key=>$lawyer_price){
            $fee = new Fee;
            $lawyer = Lawyer::findOrFail($key);
            $fee->user_id = $lawyer->user->id;
            $fee->amount = $lawyer_price*0.85;
            $question->fees()->save($fee);
        }
        foreach ($answer_helped as $key => $solved){
            $answer = Answer::findOrFail($key);
            $feedback = new Feedback;
            $feedback->helped = $solved;
            $feedback->client_id = $client->id;
            $feedback->answer_id = $answer->id;
            $feedback->save();
        }
        return redirect()->back();
    }
    public function makeSolved(Request $request, $id){
        $question = Question::findOrFail($id);
        if($question->client->id != Auth::guard('client')->user()->id){
            return redirect()->back();
        }
        $question->solved = 1;
        $question->save();
        return redirect()->back();
    }
    public function payForEveryLawyer(Request $request, $id){
        $question = Question::findOrFail($id);
        if(!$question->notPayed()){
            return redirect()->back();
        }
        $lawyers = $question->lawyers();
        $each = $question->price / $lawyers->count();

        foreach($lawyers as $key => $lawyer){
            $fee = new Fee;
            $fee->user_id = $lawyer->user->id;
            $fee->amount = 0.85*$each;
            $question->fees()->save($fee);
        }
        return redirect()->back();
    }
}

