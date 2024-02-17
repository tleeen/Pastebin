<?php

namespace App\DTO\Factories;

use App\DTO\PasteDTO;
use Illuminate\Http\Request;

class PasteDTOFactory
{
    public static function fromRequest(Request $request): PasteDTO
    {
        return self::fromArray($request->validated());
    }

    /**
     * @param array $data
     * @return PasteDTO
     */
    public static function fromArray(array $data): PasteDTO
    {
        $dto = new PasteDTO();

        $dto->title = $data['title'];
        $dto->body = $data['body'];
        $dto->typeId = $data['typeId'];
        $dto->accessModifierId = $data['accessModifierId'];
        $dto->expirationTimeId = $data['expirationTimeId'];

        return $dto;
    }
}
