<?php

namespace App\Repositories\Interfaces;

use App\DTO\SocialUserDTO;
use App\Models\User;

interface SocialRepositoryInterface
{
    /**
     * @param SocialUserDTO $dto
     * @return User
     */
    public function firstOrCreate(SocialUserDTO $dto): User;
}
