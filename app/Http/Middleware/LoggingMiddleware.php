<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Log;
use Closure;

class LoggingMiddleware
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
        $url = $request->fullUrl();
        $method = $request->method();
        $ip = $request->ip();
        Log::info("$url, $method, $ip");
        $response = $next($request);
        // Logik hier einfügen
        return $response;
    }
}
