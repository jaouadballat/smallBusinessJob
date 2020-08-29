<?php

namespace App\Http\Middleware;

use Closure;

class IsFreelancerRegistred
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
        $freelancer = auth()->user()->freelancer;
        if($freelancer->isFreelancerRegistred()) {
            return redirect()->route('freelancer.profile.update', ['id' => $freelancer->id]);
        }

        return $next($request);
    }
}
