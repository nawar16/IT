<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Admin_web
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
       
        if ( Auth::check() && Auth::user()->isAdmin() )
        {
            return $next($request);
        }
        //return response()->json(['error' => 'Unauthorized'], 401);
        return redirect()->guest('login');
        //redirect('home');
        //return $next($request);
    }
}
