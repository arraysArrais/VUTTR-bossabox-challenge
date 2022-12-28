<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class HeaderEnforcer
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $acceptHeader = $request->header('Accept');
        // $contentTypeHeader = $request->header('Content-Type');
        
        if ($acceptHeader != 'application/json') {
            return response()->json([
                'error' => "missing or invalid 'Accept' header"
            ], 400);
        }
        // if ($contentTypeHeader != 'application/json') {
        //     return response()->json([
        //         'error' => "missing or invalid 'Content-Type' header"
        //     ], 400);
        // }

        return $next($request);
    }
}
