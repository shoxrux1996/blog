<?php

namespace yuridik\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use yuridik\City;
use yuridik\Client;
use File;
use Session;

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
    	
            $this->validate($request, [
               'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                ]);
            $file = $request->file('image');
            $file_name = $file->getClientOriginalName();
            
            $client = Client::findOrFail($id);
            $client->gender = $request->gender;
    		$client->user->dateOfBirth= $request->dateOfBirth;
            $client->user->city_id = $request->city;

            $upload_folder = '/clients/photo/';
            File::delete(public_path() . $upload_folder. $client->user->photo);
            $client->user->photo = $file_name;
            $file->move(public_path() . $upload_folder, $file_name);
            
            $client->push();
    	Session::flash('message', 'Your account updated successfully');
    	
    	return redirect()->route('client.dashboard');

    }
}
