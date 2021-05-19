<?php

namespace App\Services\Schedule\UpdateSchedule;

use App\Models\Schedule;
use App\Services\Schedule\UpdateSchedule\Abstracts\UpdateScheduleServiceAbstract;
use Illuminate\Support\Facades\DB;

class UpdateScheduleService extends UpdateScheduleServiceAbstract
{
    /**
     * Processa os dados
     *
     * @return Schedule|null
     */
    public function handle(): ?Schedule
    {
        return DB::transaction(function () {
            return $this->UpdateSchedule();
        });
    }
}
