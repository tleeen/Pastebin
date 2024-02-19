<?php

namespace App\Repositories\Interfaces;

use App\Models\ExpirationTime;
use Illuminate\Database\Eloquent\Collection;

interface ExpirationTimeRepositoryInterface
{
    /**
     * @return Collection<int, ExpirationTime>
     */
    public function getAll(): Collection;
}
