<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class User_info
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */

     //admin middleware
    public function handle(Request $request, Closure $next)
    {
         if(Auth::guard('userinfo')->check()){
            return $next($request);
         }

         else{
            return redirect()->route('showLoginForm')->with('errors','You Have not permitted');
         }



    }
}
