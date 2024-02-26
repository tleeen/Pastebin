<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\JsonResponse;

class ForbiddenAccessException extends Exception
{
    /**
     * @throws BaseException
     */
    public function render(): JsonResponse
    {
        throw new BaseException(403, 'This action is not available to you');
    }
}
