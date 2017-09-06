<?php

namespace yuridik\Http\Controllers\Admin;

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


}
