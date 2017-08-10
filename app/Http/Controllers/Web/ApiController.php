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
            $id = Auth::guard('client')->user()->user->id;
            $transactions = Transaction::where('user_id', $id)->where('');
        }
        elseif(Auth::guard('lawyer')->check()
        ){
            $id = Auth::guard('lawyer')->user()->user->id;
        }
        else
            return redirect()->route('user.login');

        return view('card.checkout')->withMerchant_id($merchant_id['merchant_id'])->withUser_id($id);
    }

    public function getApi(Request $request)
    {
        /*$paycomConfig = \Config::get('paycom');



          echo json_encode($response);
          $application = new Application($paycomConfig);
          $application->run();*/
    }
}