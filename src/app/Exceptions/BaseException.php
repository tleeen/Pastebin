<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\JsonResponse;

class BaseException extends Exception
{
    protected int $statusCode;
    protected string $errorMessage;

    /**
     * @param int $statusCode
     * @param string $errorMessage
     */
    public function __construct(int $statusCode, string $errorMessage)
    {
        $this->statusCode = $statusCode;
        $this->errorMessage = $errorMessage;

        parent::__construct($errorMessage, $statusCode);
    }

    /**
     * @return int
     */
    public function getStatusCode(): int
    {
        return $this->statusCode;
    }

    /**
     * @return string
     */
    public function getErrorMessage(): string
    {
        return $this->errorMessage;
    }

    /**
     * @return JsonResponse
     */
    public function render(): JsonResponse
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
