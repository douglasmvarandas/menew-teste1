<?php

namespace App\Repositories\Contracts;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

interface ScheduleRepository
{
    /**
     * Retorna Schedule baseado no ID.
     *
     * @param integer $id
     * @return Model|null
     */
    public function getSchedule(int $id): ?Model;

    /**
     * Retorna uma coleção de Schedules.
     *
     * @return Collection|null
     */
    public function getSchedules(): ?Collection;

    /**
     * Cria um novo Schedule
     *
     * @param array $detalhes
     * @return Model|null
     */
    public function createSchedule(array $detalhes): ?Model;

    /**
     * Atualiza um Schedule
     *
     * @param int $id
     * @param array $detalhes
     * @return Model|null
     */
    public function updateSchedule(int $id, array $detalhes): ?Model;

    /**
     * Deleta um Schedule
     *
     * @param int $id
     * @param array $detalhes
     * @return bool
     */
    public function deleteSchedule(int $id): bool;
}
