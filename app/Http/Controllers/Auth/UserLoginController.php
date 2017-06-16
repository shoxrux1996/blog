<?php

namespace yuridik\Http\Controllers\Auth;

use Illuminate\Http\Request;
use yuridik\Http\Controllers\Controller;
use yuridik\Http\Controllers\Auth\ClientForgotPasswordController;
use yuridik\Http\Controllers\Auth\LawyerForgotPasswordController;
use Auth;
use DB;

class UserLoginController extends Controller
{
    public function __construct(){
		$this->middleware('guest:client', ['except'=> ['userLogout'], ['showLinkRequestForm'], ['userfinder']]);
		$this->middleware('guest:lawyer', ['except'=> ['userLogout'], ['showLinkRequestForm'], ['userfinder']]);
	}

    
    public function showLoginForm()
    {
    	return view('auth.login');
    }
    public function login(Request $request){
		$cl= DB::select('select * from clients where email = :email', ['email'=> $request->email]);	
			
		if(!empty($cl)){
		    $this->validate($request, [
		            'email' => 'required|email|exists:clients',
		            'password' => 'required|min:6'
		            ], [
			        'email.exists' => 'entered email does not exists',
			        ]);
		    if(Auth::guard('client')->attempt(['email' => $request->email, 'password'=> $request->password, 'confirmed'=> 1],$request->remember)){
	        	 return redirect()->intended(route('client.dashboard'));
        		}
         return  redirect()->back()->withInput($request->only('email', 'remember'));
		}

	    	 $this->validate($request, [
		            'email' => 'required|email|exists:lawyers',
		            'password' => 'required|min:6'
		            ], [
				    'email.exists' => 'entered email does not exists',
   			 	]);
	    	if(Auth::guard('lawyer')->attempt(['email' => $request->email, 'password'=> $request->password, 'confirmed'=> 1],$request->remember)){
	        	 return redirect()->intended(route('lawyer.dashboard'));
        	}
        	return  redirect()->back()->withInput($request->only('email', 'remember'));
        	
    }

      public function userLogout()
    {
        Auth::guard('client')->logout();
        Auth::guard('lawyer')->logout();

        return redirect('/');
    }
   	 public function showLinkRequestForm()
    {
        return view('auth.passwords.email');
    }
    public function userfinder(Request $request){
    	$cl= DB::select('select * from clients where email = :email', ['email'=> $request->email]);	
    	if(!empty($cl)){
		    $this->validate($request, [
		            'email' => 'required|email|exists:clients',]);


		  app('yuridik\Http\Controllers\Auth\ClientForgotPasswordController')->sendClientResetLinkEmail($request);
		    return redirect()->route('user.password.request');
		}
		else{
			$this->validate($request, [
		            'email' => 'required|email|exists:lawyers',]);
			
			app('yuridik\Http\Controllers\Auth\LawyerForgotPasswordController')->sendLawyerResetLinkEmail($request);
		    return redirect()->route('user.password.request');		
   		}
   	}
	
}
