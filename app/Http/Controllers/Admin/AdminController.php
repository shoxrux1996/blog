<?php

namespace yuridik\Http\Controllers\Admin;

use Illuminate\Support\Facades\Hash;
use yuridik\Http\Controllers\Controller;
use yuridik\Admin;
use Auth;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admin = Auth::guard('admin')->user();
        return view('admin.dashboard')->withAdmin($admin);
    }
    public function info(){
        $admin = Auth::user();
        return view('admin.admin-info')->withAdmin($admin);
    }
    public function update(Request $request){
        $admin = Auth::user();
        $this->validate($request, [
            'email' => 'required|string|email|max:255|unique:admins,email,'.$admin->id,
            'password' => 'required|string|min:6|confirmed',
            'name' => 'required',
        ]);

        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->password = Hash::make($request->password);
        $admin->save();
        return redirect()->route('admin.dashboard');
    }

}
