<?php

namespace App\DTO\Factories;

use App\DTO\ComplaintDTO;
use App\Utils\HashUtil;
use Illuminate\Http\Request;

class ComplaintDTOFactory
{
    public static function fromRequest(Request $request): ComplaintDTO
    {
        return self::fromArray($request->validated());
    }

    /**
     * @param array $data
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
