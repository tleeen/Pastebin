<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\interfaces\ExpirationTimeServiceInterface;
use Illuminate\Database\Eloquent\Collection;

class ExpirationTimeController extends Controller
{
    /**
     * @param ExpirationTimeServiceInterface $service
     */
    public function __construct(private readonly ExpirationTimeServiceInterface $service){}

    /**
     * @return Collection
     */
    public function index(): Collection
    {
        return $this->service->getAll();
    }
}
