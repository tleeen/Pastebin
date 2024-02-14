<?php

namespace App\Services;

use App\DTO\SocialUserDTO;
use App\Models\User;
use App\Repositories\Interfaces\SocialRepositoryInterface;
<<<<<<< HEAD
=======
use Illuminate\Support\Facades\Auth;
>>>>>>> dd45e6571d4dc077fd49887c58fe1d89052d3bb3

class SocialService
{
    /**
     * @param SocialRepositoryInterface $repository
     */
    public function __construct(protected SocialRepositoryInterface $repository){}

<<<<<<< HEAD
    public function saveUser(SocialUserDTO $dto): User
    {
        return $this->repository->firstOrCreate($dto);
=======
    /**
     * @param SocialUserDTO $dto
     * @return void
     */
    public function saveUser(SocialUserDTO $dto): void
    {
        $user = $this->repository->firstOrCreate($dto);
        Auth::login($user);
>>>>>>> dd45e6571d4dc077fd49887c58fe1d89052d3bb3
    }
}
