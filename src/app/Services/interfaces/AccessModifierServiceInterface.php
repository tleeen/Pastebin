<?php

namespace App\Services\interfaces;

use Illuminate\Database\Eloquent\Collection;

interface AccessModifierServiceInterface
{
    /**
     * @return Collection
     */
    public function getAll(): Collection;
}
