<?php

namespace yuridik\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use yuridik\City;
use yuridik\Client;
class ClientController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:client');
    }

     public function index()
    {
        return view('client.dashboard');
    }
    
    public function info(){
    	$client = Auth::user();
    	$city = City::all();
    	$cities= array();
    	foreach ($city as $key) {
    		$cities[$key->id]= $key->name;
    	}

    	return view('client.info')->withClient($client)->withCities($cities);
    }
    public function update(Request $request, $id){
    	$client = Client::findOrFail($id);
    		$client->user->dateOfBirth= $request->dateOfBirth;
    		$client->push();
    	
    	//Print "<script> alert('Your profile was successfully updated');</script>"; 
    	//return redirect()->route('client.dashboard');

    }
}
