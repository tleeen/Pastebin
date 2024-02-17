<?php

namespace App\Repositories;

use App\Models\Type;
use App\Repositories\Interfaces\TypeRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class TypeRepository implements TypeRepositoryInterface
{
    /**
     * @return Collection
     */
    public function getAll(): Collection
    {
        return Type::all();
    }
}
