<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Interfaces\UserRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class UserRepository implements UserRepositoryInterface
{
    /**
     * @param string $id
     * @return LengthAwarePaginator
     */
    public function getAllPaginatePastes(string $id): LengthAwarePaginator
    {
        return User::find($id)->pastes()->paginate(10);
    }

    /**
     * @param string $id
     * @return Collection
     */
    public function getLastPastes(string $id): Collection
    {
        return User::find($id)->pastes()->latest()->take(10)->get();
    }
}
