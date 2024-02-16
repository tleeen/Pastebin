<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Interfaces\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface
{
    public function getAllPaginatePastes(string $id)
    {
        return User::find($id)->pastes()->paginate(10);
    }

    public function getLastPastes(string $id)
    {
        return User::find($id)->pastes()->latest()->take(10)->get();
    }
}
