<?php

namespace App\Http\Middleware;

use Closure;

class checkLoginFrontend
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(session()->has('cusID'))
            return $next($request);
        else{
            return redirect()->route('frontend.getLogin');
    }
    }
}
