<?php

namespace App\Services\Schedule\UpdateSchedule\Base;

use App\Services\Schedule\UpdateSchedule\Contracts\UpdateScheduleService;
use App\Models\Schedule;
use App\Repositories\Contracts\ScheduleRepository;

abstract class UpdateScheduleServiceBase implements UpdateScheduleService
{
    /**
     * Model de Schedule.
     *
     * @var Schedule
     */
    protected Schedule $schedule;

    /**
     * Array de dados.
     *
     * @var array
     */
    protected array $data;

    /**
     * Repositório de ScheduleRepository.
     *
     * @var Schedule
     */
    protected ScheduleRepository $scheduleRepository;

   /**
     * Seta a model de Schedule.
     *
     * @param Schedule
     * @return UpdateScheduleService
     */
    public function setSchedule(Schedule $schedule): UpdateScheduleService
    {
        $this->schedule = $schedule;
        return $this;
    }

    /**
     * Seta os dados para Schedule.
     *
     * @param array $data
     * @return UpdateScheduleService;
     */
    public function setData(array $data): UpdateScheduleService
    {
        $this->data = $data;
        return $this;
    }

    /**
     * Seta o repositório de ScheduleRepository.
     *
     * @param ScheduleRepository $scheduleRepository
     * @return UpdateScheduleService
     */
    public function setScheduleRepository(ScheduleRepository $scheduleRepository): UpdateScheduleService
    {
        $this->scheduleRepository = $scheduleRepository;
        return $this;
    }
}
