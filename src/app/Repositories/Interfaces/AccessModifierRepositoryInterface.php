<?php

namespace App\Repositories\Interfaces;

use App\Models\AccessModifier;
use Illuminate\Database\Eloquent\Collection;

interface AccessModifierRepositoryInterface
{
    /**
     * @return Collection<int, AccessModifier>
     */
    public function getAll(): Collection;
}
