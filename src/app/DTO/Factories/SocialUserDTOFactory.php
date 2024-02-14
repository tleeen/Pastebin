<?php

namespace App\DTO\Factories;

use App\DTO\SocialUserDTO;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Contracts\User;

class SocialUserDTOFactory
{
    /**
     * @param User $user
     * @return SocialUserDTO
     */
    public static function fromSocialUser(User $user): SocialUserDTO
    {
        $dto = new SocialUserDTO();

        $dto->login = $user->getEmail();
<<<<<<< HEAD
        $dto->password = Hash::make('$2y$12$SLN5BppzxRPnxbwcpQ6OUulEpyBAc.DOdjSpwM4YarFqAzg44Pc5i');
=======
        $dto->password = Hash::make('12345678');
>>>>>>> dd45e6571d4dc077fd49887c58fe1d89052d3bb3

        return $dto;
    }
}
