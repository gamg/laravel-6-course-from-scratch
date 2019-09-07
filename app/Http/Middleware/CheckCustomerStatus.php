<?php

namespace App\Http\Middleware;

use Closure;

class CheckCustomerStatus
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
        $status = 1;

        if ($status != 1) {
            return redirect('/inicio');
        }

        return $next($request);
    }
}
