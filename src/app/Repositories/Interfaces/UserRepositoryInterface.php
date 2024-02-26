<?php

namespace App\Repositories\Interfaces;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

interface UserRepositoryInterface
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
