<?php

namespace App\Services\Schedule\CreateSchedule\Contracts;

use App\Models\Schedule;
use App\Models\User;
use App\Repositories\Contracts\ScheduleRepository;

interface CreateScheduleService
{
    /**
     * Seta a model se User.
     *
     * @param User $user
     * @return CreateScheduleService
     */
    public function setUser(User $user): CreateScheduleService;

    /**
     * Seta os dados para Schedule.
     *
     * @param array $dados
     * @return CreateScheduleService;
     */
    public function setData(array $data): CreateScheduleService;

    /**
     * Seta o repositório de ScheduleRepository.
     *
     * @param ScheduleRepository $ScheduleRepository
     * @return CreateScheduleService
     */
    public function setScheduleRepository(ScheduleRepository $scheduleRepository): CreateScheduleService;

    /**
     * Processa os dados
     *
     * @return Schedule|null
     */
    public function handle(): ?Schedule;
}
