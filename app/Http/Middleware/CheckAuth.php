<?php

namespace App\Http\Middleware;

use Closure;

class CheckAuth
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
        // check if session created or redirect to home
        if(!$request->session()->has('user_id'))
            return redirect()->route('home');

        return $next($request);
    }
}
