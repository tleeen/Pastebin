<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Services\interfaces\AccessModifierServiceInterface;
use Illuminate\Database\Eloquent\Collection;

class AccessModifierController extends Controller
{
    /**
     * @param AccessModifierServiceInterface $service
     */
    public function __construct(private readonly AccessModifierServiceInterface $service){}

    /**
     * @return Collection
     */
    public function index(): Collection
    {
        return $this->service->getAll();
    }
}
