<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Http\Requests\Paste\StoreRequest;
use App\Models\Paste;
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

    /**
     * @param string $hash
     * @return View
     */
    public function show(string $hash): View
    {
        $id = HashUtil::decipher($hash);

        $paste = $this->service->getById($id);

        $paste->hash_id = $hash;

        return view('pastes.show', compact('paste'));
    }

    /**
     * @return Collection
     */
    public function last(): Collection
    {
        $pastes = $this->service->getLast();

        $pastes->transform(function ($paste) {
            $paste->hash_id = HashUtil::encrypt($paste->id);
            return $paste;
        });

        return $pastes;
    }

    /**
     * @param StoreRequest $request
     * @return View
     */
    public function store(StoreRequest $request): View
    {
        $dto = $request->getDto();

        $this->service->store($dto);

        return view('pastes.ok');
    }

    /**
     * @param string $hash
     * @return Paste
     */
    public function getById(string $hash): Paste
    {
        $id = HashUtil::decipher($hash);

        $paste = $this->service->getById($id);

        $paste->hash_id = $hash;

        return $paste;
    }
}
