<?php

namespace App\Services;

use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Services\interfaces\UserServiceInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class UserService implements UserServiceInterface
{

    /**
     * @param UserRepositoryInterface $repository
     */
    public function __construct(private readonly UserRepositoryInterface $repository){}

    /**
     * @param string $id
     * @return LengthAwarePaginator
     */
    public function getAllPastes(string $id): LengthAwarePaginator
    {
        return $this->repository->getAllPaginatePastes($id);
    }

    /**
     * @param string $id
     * @return Collection
     */
    public function getLastPastes(string $id): Collection
    {
        return $this->repository->getLastPastes($id);
    }

    /**
     * @return Collection
     */
    public function getAll(): Collection
    {
        return $this->repository->getAll();
    }

    /**
     * @param string $id
     * @return void
     */
    public function delete(string $id): void
    {
        $this->repository->delete($id);
    }
}
