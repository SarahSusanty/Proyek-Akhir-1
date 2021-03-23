<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class Admin
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
        if(!Auth::check()){
            return redirect()->route('login');
        }

        // Role 1 is Admin
        if(Auth::user()->role == 1){
            return $next($request);
        }

        // Role 2 is Pengunjung
        if(Auth::user()->role == 2){
            return redirect()->route('home');
        }
    }
}
