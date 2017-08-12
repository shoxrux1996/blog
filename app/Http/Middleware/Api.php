<?php

namespace yuridik\Http\Middleware;

use Closure;
use yuridik\Paycom\Application;

class Api
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $paycomConfig = \Config::get('paycom');

        $apiApp = new Application($paycomConfig);
        $apiApp->run();


        return $next($request);

    }

}
