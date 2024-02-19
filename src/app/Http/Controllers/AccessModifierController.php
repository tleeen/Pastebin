<?php

namespace App\Http\Controllers;

use App\Http\Resources\AccessModifierResource;
use App\Services\interfaces\AccessModifierServiceInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class AccessModifierController extends Controller
{
    /**
     * @param AccessModifierServiceInterface $service
     */
    public function __construct(private readonly AccessModifierServiceInterface $service){}

    /**
     * @return AnonymousResourceCollection
     */
    public function index(): AnonymousResourceCollection
    {
        return AccessModifierResource::collection($this->service->getAll());
    }
}
