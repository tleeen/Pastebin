<?php

namespace App\Services\interfaces;

use App\DTO\SocialUserDTO;
use App\Models\User;

interface SocialServiceInterface
{
    /**
     * @param SocialUserDTO $dto
     * @return User
     */
    public function login(SocialUserDTO $dto): User;
}
