<?php

namespace App\Repositories\Interfaces;

use App\DTO\SocialUserDTO;
use App\Models\User;

interface SocialRepositoryInterface
{
    public function firstOrCreate(SocialUserDTO $dto): User;
}
