<?php

namespace App\Repositories;

use App\Repositories\Contracts\CategoryRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class CategoryRepositoryImplementation implements CategoryRepository
{

    use BaseEloquentRepository;

    /**
     * Retorna Category baseado no ID.
     *
     * @param integer $id
     * @return Model|null
     */
    public function getCategory(int $id): ?Model
    {
        return $this->find($id);
    }

    /**
     * Retorna uma coleção de Categories.
     *
     * @return Collection|null
     */
    public function getCategories(): ?Collection
    {
        return $this->getAll();
    }


    /**
     * Cria um novo Category
     *
     * @param array $detalhes
     * @return Model|null
     */
    public function createCategories(array $detalhes): ?Model
    {
        return $this->create($detalhes);
    }

    /**
     * Atualiza um Category
     *
     * @param int $id
     * @param array $detalhes
     * @return Model|null
     */
    public function updateCategory(int $id, array $detalhes): ?Model
    {
        return $this->update($id, $detalhes);
    }

    /**
     * Deleta um Category
     *
     * @param int $id
     * @param array $detalhes
     * @return bool
     */
    public function deleteCategory(int $id): bool
    {
        return $this->delete($id);
    }
}
