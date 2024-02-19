<?php

namespace App\Services\interfaces;

use App\Models\Type;
use Illuminate\Database\Eloquent\Collection;

interface TypeServiceInterface
{
    /**
     * @return Collection<int, Type>
     */
    public function getAll(): Collection;
}
