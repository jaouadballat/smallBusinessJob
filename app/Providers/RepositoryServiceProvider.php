<?php

namespace App\Providers;

use App\Repositories\AgencyRepository\AgencyRepository;
use App\Repositories\AgencyRepository\AgencyRepositoryInterface;
use App\Repositories\CategoryRepository\CategoryRepository;
use App\Repositories\CategoryRepository\CategoryRepositoryInterface;
use App\Repositories\FreelancerRepository\FreelancerRepository;
use App\Repositories\FreelancerRepository\FreelancerRepositoryInterface;
use App\Repositories\JobRepository\JobRepository;
use App\Repositories\JobRepository\JobRepositoryInterface;
use App\Repositories\MessageRepository\MessageRepository;
use App\Repositories\MessageRepository\MessageRepositoryInterface;
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

        $this->app->bind(
            FreelancerRepositoryInterface::class,
            FreelancerRepository::class
        );

        $this->app->bind(
            MessageRepositoryInterface::class,
            MessageRepository::class
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
