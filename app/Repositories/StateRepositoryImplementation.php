<?php

namespace App\Repositories;

use App\Repositories\Contracts\StateRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class StateRepositoryImplementation implements StateRepository
{

    use BaseEloquentRepository;

    /**
     * Retorna State baseado no ID.
     *
     * @param integer $id
     * @return Model|null
     */
    public function getState(int $id): ?Model
    {
        return $this->find($id);
    }

    /**
     * Retorna uma coleção de States.
     *
     * @return Collection|null
     */
    public function getStates(): ?Collection
    {
        return $this->getAll();
    }

    /**
     * Cria um novo State
     *
     * @param array $detalhes
     * @return Model|null
     */
    public function createState(array $detalhes): ?Model
    {
        return $this->create($detalhes);
    }

    /**
     * Atualiza um State
     *
     * @param int $id
     * @param array $detalhes
     * @return Model|null
     */
    public function updateState(int $id, array $detalhes): ?Model
    {
        return $this->update($id, $detalhes);
    }

    /**
     * Deleta um State
     *
     * @param int $id
     * @param array $detalhes
     * @return bool
     */
    public function deleteState(int $id): bool
    {
        return $this->delete($id);
    }
}
