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
            if(Auth::user()->active == 'no'){
                Auth::logout();
                return redirect('/login');
            } else if(Auth::user()->active == 'yes'){
                if (Auth::user()->role_id == 1){
                    //contributor
                    return redirect('/user/'.Auth::user()->name);
                } else if (Auth::user()->role_id == 2){
                    //adminblog
                    return redirect('/blog/admin');
                } else if (Auth::user()->role_id ==3){
                    return redirect('/admin');
                }
                else {
                    Auth::logout();
                    return redirect('/login');
                }
            }
        }

        return $next($request);
    }
}
