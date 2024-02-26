<?php

namespace App\Services\interfaces;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

interface UserServiceInterface
{
    /**
     * @return Collection<int, User>
     */
    public function getAll(): Collection;

    /**
     * @param int $id
     * @return void
     */
    public function delete(int $id): void;
}
