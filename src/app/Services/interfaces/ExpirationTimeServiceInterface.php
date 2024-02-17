<?php

namespace App\Services\interfaces;

use Illuminate\Database\Eloquent\Collection;

interface ExpirationTimeServiceInterface
{
    /**
     * @return Collection
     */
    public function getAll(): Collection;
}
