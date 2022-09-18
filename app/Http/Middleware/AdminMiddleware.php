<?php

namespace App\Http\Middleware;

use Closure;
use Route;
use Illuminate\Support\Facades\View;

class AdminMiddleware
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
        $response = $next($request);

        return $response;
    }
}
