<?php

namespace App\Services\Schedule\CreateSchedule\Base;

use App\Services\Schedule\CreateSchedule\Contracts\CreateScheduleService;
use App\Models\Schedule;
use App\Models\User;
use App\Repositories\Contracts\ScheduleRepository;

abstract class CreateScheduleServiceBase implements CreateScheduleService
{
    /**
     * Model de User.
     *
     * @var array
     */
    protected User $user;

    /**
     * Array de dados.
     *
     * @var array
     */
    protected array $data;

    /**
     * Repositório de ScheduleRepository.
     *
     * @var ScheduleRepository
     */
    protected ScheduleRepository $scheduleRepository;

    /**
     * Seta a model se User.
     *
     * @param User $user
     * @return CreateScheduleService
     */
    public function setUser(User $user): CreateScheduleService
    {
        $this->user = $user;
        return $this;
    }

    /**
     * Seta os dados para Schedule.
     *
     * @param array $data
     * @return CreateScheduleService;
     */
    public function setData(array $data): CreateScheduleService
    {
        $this->data = $data;
        return $this;
    }

    /**
     * Seta o repositório de ScheduleRepository.
     *
     * @param ScheduleRepository $ScheduleRepository
     * @return CreateScheduleService
     */
    public function setScheduleRepository(ScheduleRepository $scheduleRepository): CreateScheduleService
    {
        $this->scheduleRepository = $scheduleRepository;
        return $this;
    }
}
