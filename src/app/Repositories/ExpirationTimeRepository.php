<?php

namespace App\Repositories;

use App\Models\ExpirationTime;
use App\Repositories\Interfaces\ExpirationTimeRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class ExpirationTimeRepository implements ExpirationTimeRepositoryInterface
{
    /**
     * @return Collection<int, ExpirationTime>
     */
    public function getAll(): Collection
    {
        return ExpirationTime::all();
    }
}
