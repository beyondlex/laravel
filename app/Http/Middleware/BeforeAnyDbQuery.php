<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Log;

class BeforeAnyDbQuery
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
        if (\App::environment('local')) {
            \DB::enableQueryLog();
        }
        return $next($request);
    }

    public function terminate($request, $response) {
//        Log::debug('sql', \DB::getQueryLog());
    }
}
