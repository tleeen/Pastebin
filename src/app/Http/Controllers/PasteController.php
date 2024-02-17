<?php

namespace App\Http\Controllers;

use App\Services\interfaces\PasteServiceInterface;
use App\Utils\HashUtil;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;

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

    public function last(): Collection
    {
        $pastes = $this->service->getLast();

        $pastes->transform(function ($paste) {
            $paste->hash_id = HashUtil::encrypt($paste->id);
            return $paste;
        });

        return $pastes;
    }
}
