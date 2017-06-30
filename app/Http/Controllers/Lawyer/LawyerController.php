<?php

namespace yuridik\Http\Controllers\Lawyer;
use yuridik\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Auth;
use yuridik\City;
use yuridik\Lawyer;
use yuridik\File;

use Illuminate\Support\Facades\File as LaraFile;
use Session;

class LawyerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:lawyer');
    }

     public function index()
    {
        return view('lawyer.dashboard');
    }

    public function info(){
        $lawyer = Auth::user();
        $city = City::all();
        $cities= array();
        foreach ($city as $key) {
            $cities[$key->id]= $key->name;
        }

        return view('lawyer.info')->withLawyer($lawyer)->withCities($cities);
    }
    public function update(Request $request, $id){
        
        $this->validate($request, ['image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',]);
       
            
        $client = Lawyer::findOrFail($id);
        $client->gender = $request->gender;
        $client->user->dateOfBirth= $request->dateOfBirth;
        $client->user->city_id = $request->city;
        if($request->file('image') != null) {
            $file = $request->file('image');
            $file_name = $file->getClientOriginalName();
            $upload_folder = '/lawyers/photo'.$client->id.'/';
            if($client->user->file != null){
            LaraFile::delete(public_path().$upload_folder.$client->user->file->file);
                $client->user->file->file = $file_name;
                $client->user->file->path = $upload_folder;
            }
            else{
                $fil = new File;
                $fil->file = $file_name;
                $fil->path = $upload_folder;
                $client->user->file()->save($fil);
            }
            $file->move(public_path() . $upload_folder, $file_name);
        }            
        $client->push();
        Session::flash('message', 'Your account updated successfully');
        
        return redirect()->route('lawyer.dashboard');

    }

}
