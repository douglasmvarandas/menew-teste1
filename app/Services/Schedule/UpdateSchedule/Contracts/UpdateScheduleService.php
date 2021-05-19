<?php

namespace App\Services\Schedule\UpdateSchedule\Contracts;

use App\Models\Schedule;
use App\Repositories\Contracts\ScheduleRepository;

interface UpdateScheduleService
{
    /**
     * Seta a model de Schedule.
     *
     * @param Schedule
     * @return UpdateScheduleService
     */
    public function setSchedule(Schedule $schedule): UpdateScheduleService;

    /**
     * Seta os dados para Schedule.
     *
     * @param array $data
     * @return UpdateScheduleService;
     */
    public function setData(array $data): UpdateScheduleService;

    /**
     * Seta o repositório de ScheduleRepository.
     *
     * @param ScheduleRepository $ScheduleRepository
     * @return UpdateScheduleService
     */
    public function setScheduleRepository(ScheduleRepository $scheduleRepository): UpdateScheduleService;

    /**
     * Processa os dados
     *
     * @return Schedule|null
     */
    public function handle(): ?Schedule;
}
