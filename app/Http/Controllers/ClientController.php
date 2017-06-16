<?php

namespace yuridik\Http\Controllers;

use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:client');
    }

     public function index()
    {
        return view('client');
    }
    

}
