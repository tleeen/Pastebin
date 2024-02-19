<?php

namespace App\Services\interfaces;

use App\Models\ExpirationTime;
use Illuminate\Database\Eloquent\Collection;

interface ExpirationTimeServiceInterface
{
    /**
     * @return Collection<int, ExpirationTime>
     */
    public function getAll(): Collection;
}
