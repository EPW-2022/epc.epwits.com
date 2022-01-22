<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

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
        if (auth()->user()->roles === "Participant" || auth()->user()->roles === 'Quarter Finalist') {
            return redirect('/');
        } else {
            return $next($request);
        }
    }
}
