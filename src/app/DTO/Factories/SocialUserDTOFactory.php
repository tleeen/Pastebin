<?php

namespace App\DTO\Factories;

use App\DTO\SocialUserDTO;
use Illuminate\Support\Facades\Hash;

class SocialUserDTOFactory
{
    /**
     * @param array $data
     * @return SocialUserDTO
     */
    public static function fromArray(array $data): SocialUserDTO
    {
        $dto = new SocialUserDTO();

        $dto->email = $data['email'];
        $dto->password = Hash::make('$2y$12$SLN5');

        return $dto;
    }
}
