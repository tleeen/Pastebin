<?php

namespace App\Services;

use App\DTO\SocialUserDTO;
use App\Models\User;
use App\Repositories\Interfaces\SocialRepositoryInterface;


class SocialService
{
    /**
     * @param SocialRepositoryInterface $repository
     */
    public function __construct(protected SocialRepositoryInterface $repository){}

    public function saveUser(SocialUserDTO $dto): User
    {
        return $this->repository->firstOrCreate($dto);

    }
}
