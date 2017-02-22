<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class UnauthorizedUser
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
        if(Auth::check()){
            if(Auth::user()->role_id == 0 || Auth::user()->role_id == NULL || Auth::user()->active == 'no'){
                Auth::logout();
                return redirect('/login');
            }
                return $next($request);
        }
        Auth::logout();
        return redirect('/login');
    }
}
