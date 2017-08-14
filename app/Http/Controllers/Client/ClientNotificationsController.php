<?php

namespace yuridik\Http\Controllers\Client;

use Illuminate\Http\Request;
use yuridik\Http\Controllers\Controller;
use Auth;
class ClientNotificationsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:client');
    }
    public function deleteNotifications(){
        $client = Auth::guard('client')->user();
        $client->unreadNotifications->markAsRead();
        return redirect()->back();
    }
}
