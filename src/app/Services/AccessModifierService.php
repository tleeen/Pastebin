<?php

namespace App\Services;

use App\Models\AccessModifier;
use App\Repositories\Interfaces\AccessModifierRepositoryInterface;
use App\Services\interfaces\AccessModifierServiceInterface;
use Illuminate\Database\Eloquent\Collection;

class AccessModifierService implements AccessModifierServiceInterface
{
    /**
     * @param AccessModifierRepositoryInterface $repository
     */
    public function __construct(private readonly AccessModifierRepositoryInterface $repository){}

    /**
     * @return Collection<int, AccessModifier>
     */
    public function getAll(): Collection
    {
        return $this->repository->getAll();
    }
}
