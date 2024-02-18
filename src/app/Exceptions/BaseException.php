<?php

namespace App\Exceptions;

use Exception;

class BaseException extends Exception
{
    protected $statusCode;
    protected $errorMessage;

    public function __construct($statusCode, $errorMessage)
    {
        $this->statusCode = $statusCode;
        $this->errorMessage = $errorMessage;

        parent::__construct($errorMessage, $statusCode);
    }

    public function getStatusCode()
    {
        return $this->statusCode;
    }

    public function getErrorMessage()
    {
        return $this->errorMessage;
    }

    public function render()
    {
        return response()->json([
            'success' => false,
            'error' => [
                'code' => $this->getStatusCode(),
                'message' => $this->getErrorMessage(),
            ],
        ], $this->getStatusCode());
    }
}
