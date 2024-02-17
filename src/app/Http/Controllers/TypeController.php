<?php

namespace App\Http\Controllers;

use App\Services\interfaces\TypeServiceInterface;
use Illuminate\Database\Eloquent\Collection;

class TypeController extends Controller
{
    /**
     * @param TypeServiceInterface $service
     */
    public function __construct(private readonly TypeServiceInterface $service){}

    public function index(): Collection
    {
        return $this->service->getAll();
    }
}
