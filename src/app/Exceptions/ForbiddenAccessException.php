<?php

namespace App\Exceptions;

use Exception;

class ForbiddenAccessException extends Exception
{
    /**
     * @throws BaseException
     */
    public function render()
    {
        throw new BaseException(403, 'This action is not available to you');
    }
}
