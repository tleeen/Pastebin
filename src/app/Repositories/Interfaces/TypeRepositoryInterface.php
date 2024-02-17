<?php

namespace App\Repositories\Interfaces;

use Illuminate\Database\Eloquent\Collection;

interface TypeRepositoryInterface
{
    /**
     * @return Collection
     */
    public function getAll(): Collection;
}
