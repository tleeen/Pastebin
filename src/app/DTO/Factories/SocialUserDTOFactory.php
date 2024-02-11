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
        $dto->password = Hash::make('12345678');

        return $dto;
    }
}
