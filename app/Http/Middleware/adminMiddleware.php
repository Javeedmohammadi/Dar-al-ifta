<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class adminMiddleware
{
    /**
         * Handle an incoming request.
         *
         * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
    */


    public function handle(Request $request, Closure $next): Response
    {
        // Admin == 1 / Normal user == 0
        if (Auth::check()) {
            if (Auth::user()->role == '1') {
                return $next($request);
            } else {
                return to_route('user.not.admin', app()->getLocale());
            }
        } else {
            return to_route('login', app() -> getLocale());
        }

        return $next($request);
    }
    
    
}
