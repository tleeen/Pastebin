<?php

namespace App\Services;

use App\Repositories\Interfaces\TypeRepositoryInterface;
use App\Services\interfaces\TypeServiceInterface;
use Illuminate\Database\Eloquent\Collection;

class TypeService implements TypeServiceInterface
{
    /**
     * @param TypeRepositoryInterface $repository
     */
    public function __construct(private readonly TypeRepositoryInterface $repository){}

    /**
     * @return Collection
     */
    public function getAll(): Collection
    {
        return $this->repository->getAll();
    }
}
