<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Locale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $locale = $request->segment(1);

        if($locale == "en") {
            app()->setLocale('en');
            setlocale(LC_ALL, 'en_US.UTF-8');
        } else { 
            app()->setLocale('sr');
            setlocale(LC_ALL, 'sr_RS.utf8@latin');
        }
        
        return $next($request);
    }
}
