<?php

namespace yuridik\Http\Controllers\Auth;

use Illuminate\Http\Request;
use yuridik\Http\Controllers\Controller;
use yuridik\City;
use Illuminate\Support\Facades\Mail;

use yuridik\Http\Requests;
use Session;
use Auth;
use Validator;
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
            return view('auth.register')->withActiveuser('client');
    }
    public function postRegister(Request $request, $usertype)
    {
        // $usertype = $request->route('usertype');
        // $this->validate($request, [
        //    'email' => 'required|string|email|max:255|unique:clients|unique:lawyers',
        //    'password' => 'required|string|min:6|confirmed',
        //    'name' => 'required',
        //    ]);
        if ($usertype === "client") {
            $messages = [
                'required' => 'Обязательно к заполнению',
                'string' => 'Неправильный формат',
                'email' => 'Неправильный формат электронной почты',
                'max' => 'Максимум 255 символов',
                'uniqie' => 'Данный email уже используется',
                'same' => 'Пароли не совпадают',
                'min' => 'Минимум 6 символов',
            ];
            $validator = Validator::make($request->all(), [
                'client.name' => 'required',
                'client.email' => 'required|string|email|max:255|unique:clients,email|unique:lawyers,email',
                'client.password' => 'required|string|min:6',
                'client.password_confirm' => 'same:client.password',
            ]);

            if ($validator->fails()) {
                return view('auth.register')->withErrors($validator)->withActiveuser('client');
            }
            $new_client = $request->client;
            $confirmation_code = str_random(30);
            $user = new User;
            $user->firstName = $new_client['name'];
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
            $client->email = $new_client['email'];
            $client->password = bcrypt($new_client['password']);
            $client->confirmation_code = $confirmation_code;
            $client->user_id = $userID;


            $data = array('code' => $confirmation_code, 'email' => $new_client['email'], 'name' => $new_client['name']);
            Mail::send('email.verify', ['data' => $data], function ($message) use ($data) {

                $message->to($data['email'], $data['name'])
                    ->subject('Verify your email address');
            });
            $client->save();
        } elseif ($usertype === "lawyer") {
            $messages = [
                'required' => 'Обязательно к заполнению',
                'string' => 'Неправильный формат',
                'email' => 'Неправильный формат электронной почты',
                'max' => 'Максимум 255 символов',
                'uniqie' => 'Данный email уже используется',
                'same' => 'Пароли не совпадают',
                'min' => 'Минимум 6 символов',
            ];
            $validator = Validator::make($request->all(), [
                'lawyer.email' => 'required|string|email|max:255|unique:clients,email|unique:lawyers,email',
                'lawyer.password' => 'required|string|min:6',
                'lawyer.password_confirm' => 'same:lawyer.password',
                'lawyer.name' => 'required',
                'lawyer.surname' => 'required',
            ], $messages);

            if ($validator->fails()) {
                return view('auth.register')->withErrors($validator)->withActiveuser('lawyer');
            }
            $new_lawyer = $request->lawyer;
            $confirmation_code = str_random(30);
            $user = new User;
            $user->firstName = $new_lawyer['name'];
            $user->lastName = $new_lawyer['surname'];
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
            $lawyer = new Lawyer;
            $lawyer->email = $new_lawyer['email'];
            $lawyer->password = bcrypt($new_lawyer['password']);
            $lawyer->confirmation_code = $confirmation_code;
            $lawyer->user_id = $userID;

            $data = array('code' => $confirmation_code, 'email' => $new_lawyer['email'], 'name' => $new_lawyer['name']);

            Mail::send('email.verify', ['data' => $data], function ($message) use ($data) {
                $message->to($data['email'], $data['name'])
                    ->subject('Verify your email address');
            });
            $lawyer->save();

        } else {
            $messages = [
                'required' => 'Обязательно к заполнению',
                'string' => 'Неправильный формат',
                'email' => 'Неправильный формат электронной почты',
                'max' => 'Максимум 255 символов',
                'uniqie' => 'Данный email уже используется',
                'same' => 'Пароли не совпадают',
                'min' => 'Минимум 6 символов',
            ];
            $validator = Validator::make($request->all(), [
                'company.email' => 'required|string|email|max:255|unique:clients|unique:lawyers',
                'company.password' => 'required|string|min:6',
                'company.password_confirm' => 'same:company.password',
                'company.leadername' => 'required',
                'company.leadersurname' => 'required',
                'company.name' => 'required',
            ], $messages);

            if ($validator->fails()) {
                return view('auth.register')->withErrors($validator)->withActiveuser('company');
            }
        }

        Session::flash('confirm-email', 'Please confirm your account via your email');
        return redirect()->route('user.login');

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

