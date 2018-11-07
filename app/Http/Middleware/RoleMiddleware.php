<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Route;
use Closure;

class RoleMiddleware
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
        if (! check_permission($request)) {
            abort(403, "Dilarang masuk penjara!");
        }        

        return $next($request);
    }
}
