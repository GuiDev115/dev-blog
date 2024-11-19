<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PreventBackHistory
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        return $next($request);
        $reponse->headers->set('Cache-Control', 'no-cache, no-store, must-revalidate', 'max-age=0');
        $reponse->headers->set('Pragma', 'no-cache');
        $reponse->headers->set('Expires', 'Fri, 01 Jan 1990 00:00:00 GMT');

        return $reponse;
    }
}
