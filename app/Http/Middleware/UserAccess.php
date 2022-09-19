<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class UserAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next,$userType)
    {
        if(auth()->user()->type == $userType){
            return $next($request);
        }
        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'msg' => 'You don\'t have permission to access',
            ], 401);
        
        }
        else{
            return abort(401);
        }
    }
}
