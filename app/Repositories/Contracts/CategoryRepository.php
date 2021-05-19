<?php

namespace App\Repositories\Contracts;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

interface CategoryRepository
{
    /**
     * Retorna Category baseado no ID.
     *
     * @param integer $id
     * @return Model|null
     */
    public function getCategory(int $id): ?Model;

    /**
     * Retorna uma coleção de Categorys.
     *
     * @return Collection|null
     */
    public function getCategories(): ?Collection;

    /**
     * Cria um novo Categories
     *
     * @param array $detalhes
     * @return Model|null
     */
    public function createCategories(array $detalhes): ?Model;

    /**
     * Atualiza um Category
     *
     * @param int $id
     * @param array $detalhes
     * @return Model|null
     */
    public function updateCategory(int $id, array $detalhes): ?Model;

    /**
     * Deleta um Category
     *
     * @param int $id
     * @param array $detalhes
     * @return bool
     */
    public function deleteCategory(int $id): bool;
}
