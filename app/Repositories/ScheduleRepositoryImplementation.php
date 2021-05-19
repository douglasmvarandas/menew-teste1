<?php

namespace App\Repositories;

use App\Repositories\Contracts\ScheduleRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class ScheduleRepositoryImplementation implements ScheduleRepository
{
    use BaseEloquentRepository;

    /**
     * Retorna Schedule baseado no ID.
     *
     * @param integer $id
     * @return Model|null
     */
    public function getSchedule(int $id): ?Model
    {
        return $this->find($id);
    }

    /**
     * Retorna uma coleção de Schedules.
     *
     * @return Collection|null
     */
    public function getSchedules(): ?Collection
    {
        return $this->getAll();
    }

    /**
     * Cria um novo Schedule
     *
     * @param array $detalhes
     * @return Model|null
     */
    public function createSchedule(array $detalhes): ?Model
    {
        return $this->create($detalhes);
    }

    /**
     * Atualiza um Schedule
     *
     * @param int $id
     * @param array $detalhes
     * @return Model|null
     */
    public function updateSchedule(int $id, array $detalhes): ?Model
    {
        return $this->update($id, $detalhes);
    }

    /**
     * Deleta um Schedule
     *
     * @param int $id
     * @param array $detalhes
     * @return bool
     */
    public function deleteSchedule(int $id): bool
    {
        return $this->delete($id);
    }
}
