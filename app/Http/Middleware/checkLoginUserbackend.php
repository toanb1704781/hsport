<?php

namespace App\Http\Middleware;

use Closure;

class checkLoginUserbackend
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
        if(session()->has('empID')){
            return redirect()->route('backend.index');
        }
        return $next($request);
    }
}
