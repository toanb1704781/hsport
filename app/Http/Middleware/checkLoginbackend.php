<?php

namespace App\Http\Middleware;

use Closure;

class checkLoginbackend
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
        if(session()->has('empID'))
            return $next($request);
        else{
            return redirect()->route('backend.getLogin');
        }
    }
}
