<?php

namespace yuridik\Http\Controllers\Web;

use Illuminate\Http\Response;
use yuridik\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use yuridik\Transaction;

class ApiController extends Controller
{
    public function show()
    {
        $merchant_id = \Config::get('paycom');


        if (Auth::guard('client')->check()) {
            $user = Auth::guard('client')->user()->user;
            $id = $user->id;
        } elseif (Auth::guard('lawyer')->check()
        ) {
            $user = Auth::guard('lawyer')->user()->user;
            $id = $user->id;
        } else
            return redirect()->route('user.login');

        return view('card.checkout')->withMerchant_id($merchant_id['merchant_id'])->withUser_id($id)->withUser($user);
    }

    public function getApi(Request $request)
    {
        /*$paycomConfig = \Config::get('paycom');



          echo json_encode($response);
          $application = new Application($paycomConfig);
          $application->run();*/
    }
}