<?php

namespace App\Repositories\Contracts;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

interface StateRepository
{
    /**
     * Retorna State baseado no ID.
     *
     * @param integer $id
     * @return Model|null
     */
    public function getState(int $id): ?Model;

    /**
     * Retorna uma coleção de States.
     *
     * @return Collection|null
     */
    public function getStates(): ?Collection;

    /**
     * Cria um novo State
     *
     * @param array $detalhes
     * @return Model|null
     */
    public function createState(array $detalhes): ?Model;

    /**
     * Atualiza um State
     *
     * @param int $id
     * @param array $detalhes
     * @return Model|null
     */
    public function updateState(int $id, array $detalhes): ?Model;

    /**
     * Deleta um State
     *
     * @param int $id
     * @param array $detalhes
     * @return bool
     */
    public function deleteState(int $id): bool;
}
