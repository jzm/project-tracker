<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class Activated
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
			if (Auth::check() && $request->user()) {
				if (!$request->user()->active()) {
					return redirect('/not-activated');
				}
			}
      return $next($request);
    }
}
