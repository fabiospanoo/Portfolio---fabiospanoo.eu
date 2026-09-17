<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ForceCanonicalDomain
{
    /**
     * Redirect any request that is not on an allowed host to the canonical
     * domain (e.g. fabiospano.eu), 301.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $allowed = array_values(array_filter(array_map('trim', explode(',', (string) env('ALLOWED_HOSTS', '')))));

        if ($allowed === []) {
            return $next($request);
        }

        if (in_array($request->getHost(), $allowed, true)) {
            return $next($request);
        }

        $scheme = env('APP_SCHEME', 'https');
        $canonical = env('CANONICAL_HOST', $request->getHost());

        return redirect()->away($scheme.'://'.$canonical.$request->getRequestUri(), 301);
    }
}