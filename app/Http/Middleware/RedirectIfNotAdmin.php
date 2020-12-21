<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class RedirectIfNotAdmin
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
            if(Auth::user()->type =='Admin') {
                return $next($request);
            }else {
                return redirect('/login');
            }
        }else{
            return redirect('/login');
        }
	}
}
