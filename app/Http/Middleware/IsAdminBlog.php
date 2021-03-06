<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class IsAdminBlog
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
            if(((Auth::user()->isAdminBlog(Auth::user()->id))->count()) || ((Auth::user()->isAdminHead(Auth::user()->id))->count()) ){
                return $next($request);
            }
            return redirect('/login');
        }
        return redirect('/login');
    }
}
