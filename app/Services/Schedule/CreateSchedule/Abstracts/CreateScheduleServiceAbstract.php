<?php

namespace App\Services\Schedule\CreateSchedule\Abstracts;

use App\Models\Schedule;
use App\Services\Schedule\CreateSchedule\Base\CreateScheduleServiceBase;

abstract class CreateScheduleServiceAbstract extends CreateScheduleServiceBase
{
    /**
     * Implementação do código.
     *
     * @return Schedule|null
     */
    protected function createSchedule() : ?Schedule
    {
        return $this->scheduleRepository->createSchedule($this->getData());
    }

    /**
     * Retorna os dados para realizar o agendamento.
     *
     * @return array
     */
    private function getData(): array
    {
        return [
            'name'          => $this->data['name'],
            'telephone'     => $this->data['telephone'],
            'email'         => $this->data['email'],
            'city'          => $this->data['city'],
            'user_id'       => $this->user->id,
            'state_id'      => $this->data['state_id'],
            'category_id'   => $this->data['category_id']
        ];
    }
}
