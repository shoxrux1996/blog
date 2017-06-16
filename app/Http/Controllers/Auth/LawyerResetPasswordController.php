<?php

namespace yuridik\Http\Controllers\Auth;

use yuridik\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Password;
use Auth;
class LawyerResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/lawyer';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:lawyer');
    }

    protected function guard(){
        return Auth::guard('lawyer');
    }
    
    protected function broker(){
        return Password::broker('lawyers');
    }

     public function showResetForm(Request $request, $token = null)
    {
        return view('auth.passwords.reset-lawyer')->with(
            ['token' => $token, 'email' => $request->email]
        );
    }


 }
