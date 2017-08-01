<?php

namespace yuridik\Http\Controllers\Admin;

use Illuminate\Http\Request;
use yuridik\Http\Controllers\Controller;
use yuridik\City;
class AdminCityController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function cities(){
        return view('city.admin_list')->withCities(City::all());
    }
    public function cityDelete($id){
        $city = City::findOrFail($id);
        $city->delete();
        return redirect()->back();
    }
    public function cityEdit($id){
        $city = City::findOrFail($id);
        return view('city.edit')->withCity($city);
    }
    public function cityUpdate(Request $request,$id){
        $city = City::findOrFail($id);
        $city->name = $request->name;
        $city->save();
        return redirect()->route('admin.cities.index');
    }
    public function insert(){
        return view('city.insert');
    }
    public function insertSubmit(Request $request){
        $city = new City;
        $city->name = $request->name;
        $city->save();
        return redirect()->route('admin.cities.index');
    }
}
