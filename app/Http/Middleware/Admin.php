<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
//        dd(Auth::user());
        if (Auth::user()->permission == 'admin')
        {
            return $next($request);
        }
        else {
            return redirect::back()->with('danger-status', 'Access denied!');
        }
    }
}
