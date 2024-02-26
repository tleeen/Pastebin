<?php

namespace App\DTO\Factories;

use App\DTO\SocialUserDTO;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;

class SocialUserDTOFactory
{
    /**
     * @param FormRequest $request
     * @return SocialUserDTO
     */
    public static function fromRequest(FormRequest $request): SocialUserDTO
    {
        return self::fromArray($request->validated());
    }

    /**
     * @param array{'email': string} $data
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
