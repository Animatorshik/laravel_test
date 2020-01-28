<?php

namespace App\Http\Middleware;

use Closure;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
		if (! $request->user()->hasRole('admin')) {
			if (! $request->user()->hasVerifiedEmail()) {
				abort(403, 'Your email is not verified.');
			}
			if (! $request->user()->hasRole($role)) {
				abort(401);
			}
		}

		return $next($request);
    }
}
