<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class StartQuiz
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
        if (!$request->session()->has('getSession')) {
            return redirect('/');
        } else {
            return $next($request);
        }
    }
}
