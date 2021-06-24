<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminCheckMiddleware
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

        if (Auth::check() && Auth::user()->role == 'admin') {
            return $next($request);
        }else{
            return back()->with('authError',"You Dont Have permission");
             // if (Auth::check() && Auth::user()->role == 'student') {
            //     return redirect()->route('studentDashboard')->with('authError', "You Dont Havessssxx permission");
            // }
            // if (Auth::check() && Auth::user()->role == 'teacher') {
            //     return redirect('teacher\dashboard')->with('authError', "You Dont Havessss kisama permission");
            // }
        }
    }
}
