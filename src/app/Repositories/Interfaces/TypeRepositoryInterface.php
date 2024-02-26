<?php

namespace App\Repositories\Interfaces;

use App\Models\Type;
use Illuminate\Database\Eloquent\Collection;

interface TypeRepositoryInterface
{
    /**
     * @return Collection<int, Type>
     */
    public function getAll(): Collection;
}
