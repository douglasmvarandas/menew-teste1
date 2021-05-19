<?php

namespace App\Providers\Services\Schedule;

use App\Repositories\Contracts\ScheduleRepository;
use App\Services\Schedule\CreateSchedule\Contracts\CreateScheduleService as ContractsCreateScheduleService;
use App\Services\Schedule\CreateSchedule\CreateScheduleService;
use Illuminate\Support\ServiceProvider;

class CreateScheduleServiceProvider extends ServiceProvider
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
        $service = new CreateScheduleService();
        $service->setScheduleRepository(app(ScheduleRepository::class));

        $this->app->bind(ContractsCreateScheduleService::class, function() use($service){
            return $service;
        });
    }
}
