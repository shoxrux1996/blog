<?php

namespace yuridik\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use yuridik\Http\Requests;
use yuridik\Http\Controllers\Controller;

class CookieController extends Controller
{
    public function setCookie(Request $request){
    		$minutes=1;
    		$response = new Response('Hello Shox');
    		$response->withCookie(cookie('name','shox',$minutes));
    		return $response;
    }

    public function getCookie(Request $request){
    	$value = $request->cookie('name');
    	echo $value;
    }
}
