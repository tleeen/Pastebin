<?php

namespace App\Http\Controllers;

use App\Http\Resources\PasteResource;
use App\Services\interfaces\PasteServiceInterface;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class PasteController extends Controller
{
    /**
     * @param PasteServiceInterface $service
     */
    public function __construct(private readonly PasteServiceInterface $service){}

    /**
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function index(): \Illuminate\Foundation\Application|View|Factory|Application
    {
        $pastes = PasteResource::collection($this->service->getAll());

        return view('pastes.index', compact('pastes'));
    }
}
