<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;

class AllowCORS
{
    /**
     * Add header to response to allow browser CORS.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next): mixed
    {
//        $response = $next($request);
//
//        if ( App::environment('local') ) {
//            $response->header('Access-Control-Allow-Origin', '*');
//        }

        return $next($request)
            ->header('Access-Control-Allow-Origin', '*');
    }
}
