<?php

namespace App\Repositories\Interfaces;

use Illuminate\Database\Eloquent\Collection;

interface AccessModifierRepositoryInterface
{
    /**
     * @return Collection
     */
    public function getAll(): Collection;
}
