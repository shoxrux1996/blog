<?php

namespace yuridik\Http\Controllers\Web;

use yuridik\Http\Controllers\Controller;
use Illuminate\Http\Request;
use yuridik\City;

class CityController extends Controller
{
    public function show($name)
    {

        $city = City::where('name', $name)->first();
        foreach ($city->lawyers as $law) {
            echo $law->email . "<br>";
        }
    }
}
