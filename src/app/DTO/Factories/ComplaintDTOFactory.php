<?php

namespace App\DTO\Factories;

use App\DTO\ComplaintDTO;
use App\Utils\HashUtil;
use Illuminate\Foundation\Http\FormRequest;

class ComplaintDTOFactory
{
    /**
     * @param FormRequest $request
     * @return ComplaintDTO
     */
    public static function fromRequest(FormRequest $request): ComplaintDTO
    {
        return self::fromArray($request->validated());
    }

    /**
     * @param array{'body': string,
     *      'id': string,
     *      } $data
     * @return ComplaintDTO
     */
    public static function fromArray(array $data): ComplaintDTO
    {
        $dto = new ComplaintDTO();

        $dto->body = $data['body'];
        $dto->pasteId = HashUtil::decipher($data['id']);

        return $dto;
    }
}
