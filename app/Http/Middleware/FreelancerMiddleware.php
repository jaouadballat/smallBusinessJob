<?php

namespace App\Http\Middleware;

use Closure;

class FreelancerMiddleware
{

    const FREELANCER = 'freelancer';

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(auth()->user()->role !== self::FREELANCER) {
            return redirect()->back();
        }
        return $next($request);
    }
}
