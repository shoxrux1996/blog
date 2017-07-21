<?php

namespace yuridik\Http\Middleware;
use Auth;
use Closure;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {   if(Auth::guard('admin')->user()->type == 2)
            return $next($request);
        else
            abort(403, 'Unauthorized action.');
    }
}
