<?php

namespace App\Providers;

use App\Repositories\AgencyRepository\AgencyRepository;
use App\Repositories\AgencyRepository\AgencyRepositoryInterface;
use App\Repositories\CategoryRepository\CategoryRepository;
use App\Repositories\CategoryRepository\CategoryRepositoryInterface;
use App\Repositories\JobRepository\JobRepository;
use App\Repositories\JobRepository\JobRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            JobRepositoryInterface::class,
            JobRepository::class
        );

        $this->app->bind(
            CategoryRepositoryInterface::class,
            CategoryRepository::class
        );

        $this->app->bind(
            AgencyRepositoryInterface::class,
            AgencyRepository::class
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
