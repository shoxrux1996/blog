<?php

namespace yuridik\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use yuridik\City;
use yuridik\Lawyer;
use File;
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
        $file = $request->file('image');
        $file_name = $file->getClientOriginalName();

        $lawyer = Lawyer::findOrFail($id);
        $lawyer->gender = $request->gender;
        $lawyer->user->dateOfBirth= $request->dateOfBirth;
        $lawyer->user->city_id = $request->city;

        $upload_folder = '/lawyers/photo/';
        File::delete(public_path() . $upload_folder. $lawyer->user->photo);
        $lawyer->user->photo = $file_name;
        $file->move(public_path() . $upload_folder, $file_name);

        $lawyer->push();
        Session::flash('message', 'Your account updated successfully');

        return redirect()->route('lawyer.dashboard');

    }

}
