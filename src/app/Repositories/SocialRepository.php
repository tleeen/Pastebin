<?php

namespace App\Repositories;

use App\DTO\SocialUserDTO;
use App\Models\User;
use App\Repositories\Interfaces\SocialRepositoryInterface;

class SocialRepository implements SocialRepositoryInterface
{
    /**
     * @param SocialUserDTO $dto
     * @return User
     */
    public function firstOrCreate(SocialUserDTO $dto): User
    {
        return User::firstOrCreate(['email' => $dto->email], [
            'password' => $dto->password
        ]);
    }
}
