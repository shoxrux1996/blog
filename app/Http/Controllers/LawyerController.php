<?php

namespace yuridik\Http\Controllers;

use Illuminate\Http\Request;

class LawyerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:lawyer');
    }

     public function index()
    {
        return view('lawyer');
    }
    

}
