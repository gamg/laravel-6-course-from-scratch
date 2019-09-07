<?php

namespace App\Http\Middleware;

use Closure;

class CheckAge
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $maxAge)
    {
        if ($request->age > 15 && $request->age < $maxAge) {
            return redirect('/cliente');
        }
        return $next($request);
    }
}
