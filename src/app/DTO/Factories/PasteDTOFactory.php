<?php

namespace App\DTO\Factories;

use App\DTO\PasteDTO;
use Illuminate\Foundation\Http\FormRequest;

class PasteDTOFactory
{
    /**
     * @param FormRequest $request
     * @return PasteDTO
     */
    public static function fromRequest(FormRequest $request): PasteDTO
    {
        return self::fromArray($request->validated());
    }

    /**
     * @param array{'title': string,
     *     'body': string,
     *     'typeId': int,
     *     'accessModifierId': int,
     *     'expirationTimeId': int
     *     } $data
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
