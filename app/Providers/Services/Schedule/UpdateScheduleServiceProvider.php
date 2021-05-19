<?php

namespace App\Providers\Services\Schedule;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Contracts\ScheduleRepository;
use App\Services\Schedule\UpdateSchedule\UpdateScheduleService;
use App\Services\Schedule\UpdateSchedule\Contracts\UpdateScheduleService as ContractsUpdateScheduleService;

class UpdateScheduleServiceProvider extends ServiceProvider
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
        $service = new UpdateScheduleService();
        $service->setScheduleRepository(app(ScheduleRepository::class));

        $this->app->bind(ContractsUpdateScheduleService::class, function() use($service){
            return $service;
        });
    }
}
