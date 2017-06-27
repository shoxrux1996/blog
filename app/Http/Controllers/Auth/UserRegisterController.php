<?php

namespace yuridik\Http\Controllers\Auth;

use Illuminate\Http\Request;
use yuridik\Http\Controllers\Controller;

use Illuminate\Support\Facades\Mail;

use yuridik\Http\Requests;
use Session;
use Auth;

use yuridik\Client;
use yuridik\Lawyer;
use yuridik\User;

class UserRegisterController extends Controller
{
    public function __construct(){
        $this->middleware('guest:client');
        $this->middleware('guest:lawyer');
    }

    public function showRegistrationForm(){
        return view('auth.register');
    }
    public function postRegister(Request $request)
    {
         $this->validate($request, [
            'email' => 'required|string|email|max:255|unique:clients|unique:lawyers',
            'password' => 'required|string|min:6|confirmed',
            'name' => 'required',
            ]);

        $confirmation_code = str_random(30);       
        $user = new User;
        $user->firstName = $request->name;
        $user->save();
        $userID=$user->id;

        if($request->user == "lawyer"){

            $client=new lawyer;
            $client->email= $request->email;
            $client->password=bcrypt($request->password);
            $client->confirmation_code=$confirmation_code;
            $client->user_id = $userID;

            $data=array('code' =>$confirmation_code, 'email' =>$request->email, 'name' => $request->name);
            Mail::send('email.verify', ['data' => $data], function($message) use ($data) {
            $message->to($data['email'], $data['name'])
                ->subject('Verify your email address');
                    });
             $client->save();
        }
        else{
            $lawyer=new Client;
            $lawyer->email= $request->email;
            $lawyer->password=bcrypt($request->password);
            $lawyer->confirmation_code=$confirmation_code;
            $lawyer->user_id = $userID;
            $data=array('code' =>$confirmation_code, 'email' =>$request->email, 'name' => $request->name);
            Mail::send('email.verify', ['data' => $data], function($message) use ($data) {
            $message->to($data['email'], $data['name'])
                ->subject('Verify your email address');
        });
            $lawyer->save();
        }
            

            Session::flash('message', 'Please confirm your account via your email');
            return redirect('/');
    }
    public function confirm($code){
        if( !$code)
        {
            Print "<script>alert('Invalid Confirmation Code ');</script>";
        }
        $cl = Client::where(['confirmation_code'=> $code])->first();
        $lw = Lawyer::where(['confirmation_code'=> $code])->first();
        
        if(!is_null($lw)){
            if($lw->confirmed == 0){
            $lw->confirmation_code =null;
            $lw->confirmed=1;
            $lw->save();
            Session::flash('message', 'You have successfully verified your account.');
            }else{
            Session::flash('error-message', 'You have already verified your account.');
            }
            return redirect('user/login');
        }
        if(!is_null($cl)){
            if($cl->confirmed == 0){
            $cl->confirmation_code =null;
            $cl->confirmed=1;
            $cl->save();
            Session::flash('message', 'You have successfully verified your account.');
            }else{
            Session::flash('error-message', 'You have already verified your account.');
            }
            return redirect('user/login');
        }

        Print "<script>alert('Invalid Confirmation Code ');</script>";

        
    }
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
   
}

