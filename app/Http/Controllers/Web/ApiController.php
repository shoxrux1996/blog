<?php

namespace yuridik\Http\Controllers\Web;
use Illuminate\Http\Response;
use yuridik\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use yuridik\Paycom\Application;


class ApiController extends Controller
{

    
    public function show(){
        $merchant_id = \Config::get('paycom');

        $user = "1233";
        $amount = 400000;

        return view('card.checkout')->withMerchant_id($merchant_id['merchant_id'])->withUser($user)->withAmount($amount);
    }
    public function getApi(Request $request){
      /*$paycomConfig = \Config::get('paycom');



        echo json_encode($response);
        $application = new Application($paycomConfig);
        $application->run();*/
    }
}