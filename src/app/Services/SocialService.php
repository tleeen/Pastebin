<?php

namespace App\Services;

use App\DTO\SocialUserDTO;
use App\Models\User;
use App\Repositories\Interfaces\SocialRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class SocialService
{
    public function __construct(protected SocialRepositoryInterface $repository){}
    public function saveUser(SocialUserDTO $dto)
    {
        $user = $this->repository->firstOrCreate($dto);
        Auth::login($user);
    }
}
