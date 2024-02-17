<?php

namespace App\DTO\Factories;

use App\DTO\SocialUserDTO;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SocialUserDTOFactory
{
    public static function fromRequest(Request $request): SocialUserDTO
    {
        return self::fromArray($request->validated());
    }

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
