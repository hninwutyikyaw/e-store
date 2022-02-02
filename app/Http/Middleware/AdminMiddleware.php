<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
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
        if(auth()->check())
            {
                if(auth()->user()->role_as == '1') 
            {
                return $next ($request);
            }
            else
            {
                return redirect('/home')->with('status', 'Access Denied');
            }
        }
        else 
            {
                return redirect('/home')->with('status', 'Please login first');
            }
    }
}
