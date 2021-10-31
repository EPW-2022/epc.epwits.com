<?php

namespace App\Http\Middleware;

use Closure;
use phpDocumentor\Reflection\Types\Null_;

class Registered
{
  /**
   * Handle an incoming request.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \Closure  $next
   * @return mixed
   */
  public function handle($request, Closure $next)
  {
    if (auth()->user()->verified_at == null) {
      return redirect('/verifying');
    } else {
      return redirect('/');
    }
  }
}
