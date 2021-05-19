<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryProvider extends ServiceProvider
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
        $this->app->bind(\App\Repositories\Contracts\CategoryRepository::class, function ($app) {
            return new \App\Repositories\CategoryRepositoryImplementation(new \App\Models\Category());
        });

        $this->app->bind(\App\Repositories\Contracts\StateRepository::class, function ($app) {
            return new \App\Repositories\StateRepositoryImplementation(new \App\Models\State());
        });

        $this->app->bind(\App\Repositories\Contracts\ScheduleRepository::class, function ($app) {
            return new \App\Repositories\ScheduleRepositoryImplementation(new \App\Models\Schedule());
        });
    }
}
