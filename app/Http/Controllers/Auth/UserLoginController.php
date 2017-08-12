<?php

namespace yuridik\Http\Controllers\Auth;

use Carbon\Carbon;
use Illuminate\Http\Request;
use yuridik\Client;
use yuridik\Lawyer;
use yuridik\Http\Controllers\Controller;
use Auth;
use DB;

class UserLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:lawyer', ['except' => ['userLogout'], ['showLinkRequestForm'], ['userfinder']]);
        $this->middleware('guest:client', ['except' => ['userLogout'], ['showLinkRequestForm'], ['userfinder']]);

    }


    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $cl = Client::where('email', $request->email)->first();

        if (!empty($cl)) {
            $messages = [
                'required' => 'Обязательно к заполнению',
                'email' => 'Неправильный формат электронной почты', 'min' => 'Минимум 6 символов',
            ];
            $this->validate($request, [
                'email' => 'required|email',
                'password' => 'required|min:6',
            ], $messages);
            if ($cl->isBlocked == 1) {
                if ($cl->blockedTill <= Carbon::now('Asia/Tashkent')) {
                    $cl->isBlocked = 0;
                    $cl->save();
                } else {
                    return redirect()->back()->withInput($request->only('email', 'remember'))->withErrors(['wrong-attempt' => 'Вы заблокированы']);
                }
            }
            if ($cl->confirmed == 0) {
                return redirect()->back()->withInput($request->only('email', 'remember'))->withErrors(['wrong-attempt' => 'Подтвердите адрес электронной почты']);
            }
            $credentials = ['email' => $request->email, 'password' => $request->password];
            if (Auth::guard('client')->attempt($credentials, $request->remember)) {

                return redirect()->intended(route('client.dashboard'));
            }
            return redirect()->back()->withInput($request->only('email', 'remember'))->withErrors(['wrong-attempt' => 'Неправильный email или пароль']);
        }

        $cl = Lawyer::where('email', $request->email)->first();
        $messages = [
            'required' => 'Обязательно к заполнению',
            'email' => 'Неправильный формат электронной почты', 'min' => 'Минимум 6 символов',
        ];
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6'
        ], $messages);
        if ($cl->isBlocked == 1) {
            if ($cl->blockedTill <= Carbon::now('Asia/Tashkent')) {
                $cl->isBlocked = 0;
                $cl->save();
            } else {
                return redirect()->back()->withInput($request->only('email', 'remember'))->withErrors(['wrong-attempt' => 'Вы заблокированы']);
            }
        }
        if ($cl->confirmed == 0) {
            return redirect()->back()->withInput($request->only('email', 'remember'))->withErrors(['wrong-attempt' => 'Подтвердите адрес электронной почты']);
        }
        $credentials = ['email' => $request->email, 'password' => $request->password];
        if (Auth::guard('lawyer')->attempt($credentials, $request->remember)) {

            return redirect()->intended(route('client.dashboard'));
        }
        return redirect()->back()->withInput($request->only('email', 'remember'))->withErrors(['wrong-attempt' => 'Неправильный email или пароль']);
    }


    public function userLogout()
    {
        Auth::guard('lawyer')->logout();
        Auth::guard('client')->logout();


        return redirect('/');
    }

    public function showLinkRequestForm()
    {
        return view('auth.passwords.email');
    }

    public function userfinder(Request $request)
    {
        $cl = DB::select('select * from clients where email = :email', ['email' => $request->email]);
        if (!empty($cl)) {
            $messages = [
                'email' => 'Неправильный формат электронной почты',
            ];
            $this->validate($request, [
                'email' => 'required|email|exists:clients',], $messages);


            app('yuridik\Http\Controllers\Auth\ClientForgotPasswordController')->sendClientResetLinkEmail($request);
            return redirect()->route('user.password.request');
        } else {
            $messages = [
                'email' => 'Неправильный формат электронной почты',
            ];
            $this->validate($request, [
                'email' => 'required|email|exists:lawyers',], $messages);

            app('yuridik\Http\Controllers\Auth\LawyerForgotPasswordController')->sendLawyerResetLinkEmail($request);
            return redirect()->route('user.password.request');
        }
    }


}
