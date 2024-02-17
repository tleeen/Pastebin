<?php

namespace App\Services\interfaces;

use Illuminate\Database\Eloquent\Collection;

interface TypeServiceInterface
{
    /**
     * @return Collection
     */
    public function getAll(): Collection;
}
