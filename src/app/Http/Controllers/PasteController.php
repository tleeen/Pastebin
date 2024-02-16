<?php

namespace App\Http\Controllers;

use App\Http\Requests\Paste\ShowRequest;
use App\Services\interfaces\PasteServiceInterface;
use App\Utils\HashUtil;
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
     * @return View
     */
    public function index(): View
    {
        $pastes = $this->service->getAll();

        $pastes->transform(function ($paste) {
            $paste->hash_id = HashUtil::encrypt($paste->id);
            return $paste;
        });

        return view('pastes.index', compact('pastes'));
    }
    public function show(string $hash): View
    {
        $id = HashUtil::decipher($hash);

        $paste = $this->service->getById($id);

        $paste->hash_id = HashUtil::encrypt($paste->id);

        return view('pastes.show', compact('paste'));
    }
}
