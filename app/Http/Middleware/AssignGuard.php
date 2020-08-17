<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Response;

class AssignGuard
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if($guard != null){
            if ($guard == "api" && !Auth::guard($guard)->check()) {
                return Response::json(array(
                    'code'      =>  401,
                    'message'   =>  'only user'
                ), 401);
            }
            if ($guard == "doctors" && !Auth::guard($guard)->check()) {
                return Response::json(array(
                    'code'      =>  401,
                    'message'   =>  'only doctors'
                ), 401);
            }
        }
            //auth()->shouldUse($guard);
        $response = $next($request);
        //$response->headers->set('Authorization', 'Bearer '.$request->bearerToken());
        return $response;
    }
}
