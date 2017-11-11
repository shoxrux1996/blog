<?php

namespace yuridik\Http\Controllers\Web;

use Illuminate\Http\Response;
use Illuminate\Pagination\Paginator;
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
            $collection1= collect($user->orders);
            $collection2 = collect($user->transactions()->select('id', 'amount', 'create_time as created_at', 'user_id')->get());
            $collection3 = collect($user->fees);
            $collection4 = collect($user->withdraws);
            $transactions= $collection1->merge($collection2)->merge($collection3)->merge($collection4)
                ->sortByDesc('created_at');
        } elseif (Auth::guard('lawyer')->check()) {
            $user = Auth::guard('lawyer')->user()->user;
            $id = $user->id;
            $collection1= collect($user->orders);
            $collection2 = collect($user->transactions()->select('id', 'amount', 'create_time as created_at', 'user_id')->get());
            $collection3 = collect($user->fees);
            $collection4 = collect($user->withdraws);
            $transactions= $collection1
                ->merge($collection2)
                ->merge($collection3)
                ->merge($collection4)
                ->sortByDesc('created_at');
        } else
            return redirect()->route('user.login');


        return view('card.checkout')
            ->withMerchant_id($merchant_id['merchant_id'])
            ->withUser_id($id)
            ->withUser($user)
            ->withTransactions($transactions);
    }

    public function getApi(Request $request)
    {
        /*$paycomConfig = \Config::get('paycom');



          echo json_encode($response);
          $application = new Application($paycomConfig);
          $application->run();*/
    }
}