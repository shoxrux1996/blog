<?php

namespace yuridik\Http\Controllers\Lawyer;

use Illuminate\Http\Request;
use yuridik\Http\Controllers\Controller;
use Auth;
use yuridik\Lawyer;

class LawyerNotificationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:lawyer');
    }
    public function notificationAsRead(){
        Auth::guard('lawyer')->user()->unreadNotifications()->delete();
        return redirect()->back();
    }
}
