<?php

namespace App\Http\Middleware;

use Closure;

class HasRegisterAgency
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
        if(!auth()->user()->hasRegisterAgency()) {
            return redirect()
                    ->route('agency.create')
                    ->with(['create_agency_warning' => 'Please Fill this form first']);
        }
        return $next($request);
    }
}
