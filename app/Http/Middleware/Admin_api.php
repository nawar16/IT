<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Admin_api
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
       
        if ( auth('api')->check() && auth('api')->user()->isAdmin() )
        {
            return $next($request);
        }
        return response()->json(['Status'=> 0,'Error' => 'Unauthorized'], 401);
        //return redirect()->guest('login');
        //redirect('home');
        //return $next($request);
    }
}
