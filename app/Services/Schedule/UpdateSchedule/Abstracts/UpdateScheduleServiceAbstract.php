<?php

namespace App\Services\Schedule\UpdateSchedule\Abstracts;

use App\Models\Schedule;
use App\Services\Schedule\UpdateSchedule\Base\UpdateScheduleServiceBase;

abstract class UpdateScheduleServiceAbstract extends UpdateScheduleServiceBase
{
    /**
     * Implementação do código.
     *
     * @return Schedule|null
     */
    protected function UpdateSchedule() : ?Schedule
    {
        return $this->scheduleRepository->UpdateSchedule($this->schedule->id, $this->data);
    }
}
