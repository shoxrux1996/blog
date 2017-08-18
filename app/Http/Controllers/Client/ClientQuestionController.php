<?php

namespace yuridik\Http\Controllers\Client;

use yuridik\Http\Controllers\Controller;
use App;
use Illuminate\Http\Request;
use yuridik\Question;
use yuridik\Category;
use yuridik\File;
use yuridik\Client;
use Illuminate\Support\Facades\Session;
use Auth;
use Validator;
use yuridik\Order;
use yuridik\Lawyer;
use yuridik\User;
use yuridik\City;
use Illuminate\Support\Facades\Mail;
use DB;

class ClientQuestionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:client',['except' => ['create', 'store','questionCreate','questionCreateEloquent']]);
    }

    public function create()
    {   
        $category = Category::all();
        $clients= Client::all();
        $emails = array();
        foreach ($clients as $client) {
            array_push($emails, $client->email);
        }
        $categories = array(' ' => null);
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
                    return redirect()->route('client.dashboard');
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
                return redirect()->route('user.login');
            }
            elseif (Session::has('message')) {
                Session::reflash();  
                return redirect()->route('card.payment');
            }
        }        
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
            } elseif ($request->type == 1) {
                if ($client->user->balance() >= 1000) {
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
                $question->price = 1000;
                $question->type = 1;
                break;
            case 2:
                $question->price = 5000;
                $question->type = 2;
                break;
        }
        $question->save();
        $client->user->save();// is it possible?

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
        if($question->price!=0){
            $order = new Order;
            $order->user_id = $question->client->user->id;
            $order->amount = $question->price;
            $question->order()->save($order);
        }
        return true;    
    }
}

