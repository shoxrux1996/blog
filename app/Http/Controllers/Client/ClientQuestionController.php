<?php

namespace yuridik\Http\Controllers\Client;
use yuridik\Http\Controllers\Controller;

use Illuminate\Http\Request;
use yuridik\Question;
use yuridik\Category;
use yuridik\File;
use yuridik\Client;
use Illuminate\Support\Facades\Session;
use Auth;
use Validator;
use yuridik\Order;
class ClientQuestionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:client');
    }
    public function create()
    {
        $category = Category::all();
        
        $categories = array(' ' => null);
        foreach ($category as $key) {
            $categories[$key->id] = $key->name;
        }
        $client = Auth::guard('client')->user();
        return view('question.create')->withCategories($categories)->withClient($client);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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

       
        $count = count($request->file('files'))-1;
    

        foreach(range(0, $count) as $i) {
             $rules['files.' . $i] = 'mimes:doc,docx,pdf|max:3000';
        }
        Validator::make($request->all(), $rules,$messages)->validate();
        $client = Auth::user();

        if($request->type == 2){
            if($client->user->balance() >= 5000){
                $question = new Question;
                $question->title = $request->title;
                $question->text = $request->description;
                $question->category_id = $request->category;
                $question->client_id = $client->id;
                $question->price = 5000;
                $question->type = 2;
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

                $order = new Order;
                $order->user_id = $question->client->user->id;
                $order->amount = $question->price;
                $question->order()->save($order);

                Session::flash('message', 'Question created successfully');
                return redirect()->route('client.dashboard');
            }
            else
            {
                Session::flash('message', 'Not enough money, Please charge your balance');
                return redirect()->route('card.payment');
            }
        }
        elseif($request->type == 1){
            if($client->user->balance() >= 1000){
                $question = new Question;
                $question->title = $request->title;
                $question->text = $request->description;
                $question->category_id = $request->category;
                $question->client_id = $client->id;
                $question->price = 1000;
                $question->type = 1;
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

                $order = new Order;
                $order->user_id = $question->client->user->id;
                $order->amount = $question->price;
                $question->order()->save($order);

                Session::flash('message', 'Question created successfully');
                return redirect()->route('client.dashboard');
            }
            else
            {
                Session::flash('message', 'Not enough money, Please charge your balance');
                return redirect()->route('card.payment');
            }
        }
        else{
            $question = new Question;
            $question->title = $request->title;
            $question->text = $request->description;
            $question->category_id = $request->category;
            $question->client_id = $client->id;
            $question->type = 0;
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
            Session::flash('message', 'Question created successfully');
            return redirect()->route('client.dashboard');
        }                
    }

    public function myQuestions(){
        $questions = Question::where('client_id',Auth::user()->id)->orderBy('id','desc')->paginate(5);
        return view('client.questions')->withQuestions($questions);
    }
    public function showQuestion($id){
        $question = Auth::user()->questions->find($id);
        return view('client.question_show')->withQuestion($question);
    }

}
