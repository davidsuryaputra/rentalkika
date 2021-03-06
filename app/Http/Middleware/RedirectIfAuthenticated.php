<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
        	//return redirect(Auth::user()->role->name);
			//access middleware guest tapi masih login -> redirect ke home   
		   /*if(Auth::user()->role->name == "customer"){
          		return redirect('/customer');
           }else if(Auth::user()->role->name == "partner"){
				return redirect('/partner');           
           }
           else{
				return redirect('/admin');           
           }*/    
           return redirect('/home');

        }
        
        return $next($request);
    }
}
