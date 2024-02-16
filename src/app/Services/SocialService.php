<?php

namespace App\Services;

use App\DTO\SocialUserDTO;
use App\Models\User;
use App\Repositories\Interfaces\SocialRepositoryInterface;
use App\Services\interfaces\SocialServiceInterface;


class SocialService implements SocialServiceInterface
{
    /**
     * @param SocialRepositoryInterface $repository
     */
    public function __construct(private readonly SocialRepositoryInterface $repository){}

    /**
     * @param SocialUserDTO $dto
     * @return User
     */
    public function login(SocialUserDTO $dto): User
    {
        return $this->repository->firstOrCreate($dto);
    }
}
