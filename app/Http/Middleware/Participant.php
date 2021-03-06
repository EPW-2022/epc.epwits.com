<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Participant
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
        if (auth()->user()->roles === "Participant" || auth()->user()->roles === "Quarter Finalist" || auth()->user()->roles === "Semifinalist") {
            return $next($request);
        } else {
            return redirect('/admin');
        }
    }
}
