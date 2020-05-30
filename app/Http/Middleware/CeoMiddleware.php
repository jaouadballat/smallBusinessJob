<?php

namespace App\Http\Middleware;

use Closure;

class CeoMiddleware
{
    const CEO = 'ceo';
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(auth()->user() && auth()->user()->role !== self::CEO) {
            return redirect()->back();
        }
        return $next($request);
    }
}
