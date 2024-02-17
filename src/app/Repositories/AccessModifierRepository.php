<?php

namespace App\Repositories;

use App\Models\AccessModifier;
use App\Repositories\Interfaces\AccessModifierRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class AccessModifierRepository implements AccessModifierRepositoryInterface
{
    /**
     * @return Collection
     */
    public function getAll(): Collection
    {
        return AccessModifier::all();
    }
}
