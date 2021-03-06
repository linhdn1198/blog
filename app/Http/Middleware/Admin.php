<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Session;

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
        if(Auth::user()->admin){
            return $next($request);
        }else{
            Session::flash('info','You do not have permission to perform this action.');
            return redirect()->back();
        }
    }
}
