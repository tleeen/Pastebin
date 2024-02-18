<?php

namespace App\Repositories\Interfaces;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

interface UserRepositoryInterface
{
    /**
     * @param string $id
     * @return LengthAwarePaginator
     */
    public function getAllPaginatePastes(string $id): LengthAwarePaginator;

    /**
     * @param string $id
     * @return Collection
     */
    public function getLastPastes(string $id): Collection;

    /**
     * @return Collection
     */
    public function getAll(): Collection;

    /**
     * @param string $id
     * @return void
     */
    public function delete(string $id): void;
}
