<?php

namespace App\Services;

use App\Models\ExpirationTime;
use App\Repositories\Interfaces\ExpirationTimeRepositoryInterface;
use App\Services\interfaces\ExpirationTimeServiceInterface;
use Illuminate\Database\Eloquent\Collection;

class ExpirationTimeService implements ExpirationTimeServiceInterface
{
    /**
     * @param ExpirationTimeRepositoryInterface $repository
     */
    public function __construct(private readonly ExpirationTimeRepositoryInterface $repository){}

    /**
     * @return Collection<int, ExpirationTime>
     */
    public function getAll(): Collection
    {
        return $this->repository->getAll();
    }
}
