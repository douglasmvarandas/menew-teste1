<?php

namespace App\Services\Schedule\CreateSchedule;

use App\Models\Schedule;
use App\Services\Schedule\CreateSchedule\Abstracts\CreateScheduleServiceAbstract;
use Illuminate\Support\Facades\DB;

class CreateScheduleService extends CreateScheduleServiceAbstract
{
    /**
     * Processa os dados
     *
     * @return Schedule|null
     */
    public function handle(): ?Schedule
    {
        return DB::transaction(function () {
            return $this->createSchedule();
        });
    }
}
