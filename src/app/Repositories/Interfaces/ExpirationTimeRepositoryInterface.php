<?php

namespace App\Repositories\Interfaces;

use Illuminate\Database\Eloquent\Collection;

interface ExpirationTimeRepositoryInterface
{
    /**
     * @return Collection
     */
    public function getAll(): Collection;
}
