<?php

namespace App\Http\Controllers;

use App\Http\Resources\PasteResource;
use App\Services\interfaces\PasteServiceInterface;
use App\Utils\HashUtil;
use Hashids\Hashids;
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
        $pastes = $this->service->getAll();

        $pastes->transform(function ($paste) {
            $paste->hash = HashUtil::encrypt($paste->id);
            return $paste;
        });

        return view('pastes.index', compact('pastes'));
    }
}
