<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Http\Resources\TypeResource;
use App\Services\interfaces\TypeServiceInterface;
use Illuminate\Database\Eloquent\Collection;

class TypeController extends Controller
{
    /**
     * @param TypeServiceInterface $service
     */
    public function __construct(private readonly TypeServiceInterface $service){}

    public function index()
    {
        return TypeResource::collection($this->service->getAll());
    }
}
