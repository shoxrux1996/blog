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
            $this->validate($request, [
               'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                ]);

            $client->gender = $request->gender;
    		$client->user->dateOfBirth= $request->dateOfBirth;
            $client->user->city_id = $request->city;

            $client->user->photo = $file = $path = $request->image->path();


        $client->push();
    	
    	//Print "<script> alert('Your profile was successfully updated');</script>"; 
    	//return redirect()->route('client.dashboard');

    }
}
