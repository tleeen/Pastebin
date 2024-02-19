<?php

namespace App\Services\interfaces;

use App\Models\AccessModifier;
use Illuminate\Database\Eloquent\Collection;

interface AccessModifierServiceInterface
{
    /**
     * @return Collection<int, AccessModifier>
     */
    public function getAll(): Collection;
}
