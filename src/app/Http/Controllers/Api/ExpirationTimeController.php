<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ExpirationTimeResource;
use App\Services\interfaces\ExpirationTimeServiceInterface;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ExpirationTimeController extends Controller
{
    /**
     * @param ExpirationTimeServiceInterface $service
     */
    public function __construct(private readonly ExpirationTimeServiceInterface $service){}

    /**
     * @return AnonymousResourceCollection
     */
    public function index(): AnonymousResourceCollection
    {
        return ExpirationTimeResource::collection($this->service->getAll());
    }
}
