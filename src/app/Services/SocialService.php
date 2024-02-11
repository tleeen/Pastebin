<?php

namespace App\Services;

use App\DTO\SocialUserDTO;
use App\Models\User;
use App\Repositories\Interfaces\SocialRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class SocialService
{
    /**
     * @param SocialRepositoryInterface $repository
     */
    public function __construct(protected SocialRepositoryInterface $repository){}

    /**
     * @param SocialUserDTO $dto
     * @return void
     */
    public function saveUser(SocialUserDTO $dto): void
    {
        $user = $this->repository->firstOrCreate($dto);
        Auth::login($user);
    }
}
