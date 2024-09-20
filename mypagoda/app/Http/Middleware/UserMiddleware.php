<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class UserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (!empty(Auth::check())) {
            if (Auth::user()->role_id  == '2' || Auth::user()->role_id == '1') {
                return $next($request);
            } else {
                Auth::logout();
                return redirect()->route('homepage');
            }
        } else {
            Auth::logout();
            return redirect()->route('home.login');
        }
    }
}
