<?php

namespace yuridik\Http\Middleware;

use Closure;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\App;
use Config;
use Illuminate\Support\Facades\Session;

class Language
{
    public function handle($request, Closure $next)
    {
        if($request->hasCookie('language')) {
            $cookie = $request->cookie('language');
            if (in_array($cookie, Config::get('app.locales'))) {
	            $locale = $cookie;
	        } else $locale = Config::get('app.locale');
            app()->setLocale($locale);

            return $next($request);
        } else {
            $response = $next($request);
            $response->withCookie(cookie()->forever('language', Config::get('app.locale')));
            return $response;
        }
    }

}