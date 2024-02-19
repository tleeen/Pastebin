<?php

namespace App\Repositories\Interfaces;

use App\Models\User;
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
     * @return Collection<int, User>
     */
    public function getLastPastes(string $id): Collection;

    /**
     * @return Collection<int, User>
     */
    public function getAll(): Collection;

    /**
     * @param string $id
     * @return void
     */
    public function delete(string $id): void;
}
