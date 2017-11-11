<?php

namespace yuridik\Http\Controllers\Admin;

use Illuminate\Http\Request;
use yuridik\Http\Controllers\Controller;
use yuridik\Withdraw;

class AdminWithdrawController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');

    }
    public function index(){

        $withdraws = Withdraw::where('state', 0)->orderBy('id', 'desc')->paginate(40    );

        return view('admin.withdraw')->withWithdraws($withdraws);
    }
    public function withdraw($id){
        $withdraw = Withdraw::findOrFail($id);
        $withdraw->state = 1;
        $withdraw->save();
        //notify lawyer

        return back();
    }
}
