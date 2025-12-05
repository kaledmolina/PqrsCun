<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\URL;

class ForceHttps
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!$request->secure() && app()->environment('production')) {
            // Force the request to be treated as secure
            $request->server->set('HTTPS', 'on');
            $request->server->set('HTTP_X_FORWARDED_PROTO', 'https');
            
            // Also update the global server variables just in case
            $_SERVER['HTTPS'] = 'on';
            $_SERVER['HTTP_X_FORWARDED_PROTO'] = 'https';
            
            // Force URL generation to HTTPS
            URL::forceScheme('https');
        }

        return $next($request);
    }
}
