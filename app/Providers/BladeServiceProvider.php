<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class BladeServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::if('ceo', function () {
            return auth()->user() && auth()->user()->role === 'ceo';
        });

        Blade::if('freelancer', function () {
            return auth()->user() && auth()->user()->role === 'freelancer';
        });
    }
}
