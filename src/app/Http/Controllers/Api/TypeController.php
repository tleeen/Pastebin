<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Http\Resources\TypeResource;
use App\Services\interfaces\TypeServiceInterface;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class TypeController extends Controller
{
    /**
     * @param TypeServiceInterface $service
     */
    public function __construct(private readonly TypeServiceInterface $service){}

    /**
     * @return AnonymousResourceCollection
     */
    public function index(): AnonymousResourceCollection
    {
        return TypeResource::collection($this->service->getAll());
    }
}
