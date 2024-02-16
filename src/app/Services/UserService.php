<?php

namespace App\Services;

use App\Repositories\Interfaces\SocialRepositoryInterface;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Services\interfaces\UserServiceInterface;

class UserService implements UserServiceInterface
{

    /**
     * @param UserRepositoryInterface $repository
     */
    public function __construct(private readonly UserRepositoryInterface $repository){}
    public function getAllPastes(string $id)
    {
        return $this->repository->getAllPaginatePastes($id);
    }

    public function getLastPastes(string $id)
    {
        return $this->repository->getLastPastes($id);
    }
}
