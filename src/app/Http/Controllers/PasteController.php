<?php

namespace App\Http\Controllers;

use App\Http\Requests\Paste\StoreRequest;
use App\Models\Paste;
use App\Services\interfaces\AccessModifierServiceInterface;
use App\Services\interfaces\ExpirationTimeServiceInterface;
use App\Services\interfaces\PasteServiceInterface;
use App\Services\interfaces\TypeServiceInterface;
use App\Utils\UserUtil;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;

class PasteController extends Controller
{
    public function __construct(
        private readonly PasteServiceInterface $pasteService,
        private readonly TypeServiceInterface $typeService,
        private readonly AccessModifierServiceInterface $accessModifierService,
        private readonly ExpirationTimeServiceInterface $expirationTimeService
    )
    {}

    /**
     * @return View
     */
    public function index(): View
    {
        $pastes = $this->pasteService->getAllPaginate();

        return view('pastes.index', compact('pastes'));
    }

    /**
     * @param string $hash
     * @return View
     */
    public function show(string $hash): View
    {
        $paste = $this->pasteService->getById($hash);

        return view('pastes.show', compact('paste'));
    }

    /**
     * @return Collection
     */
    public function last(): Collection
    {
        return $this->pasteService->getLast();
    }

    /**
     * @param StoreRequest $request
     * @return View
     */
    public function store(StoreRequest $request): View
    {
        $dto = $request->getDto();

        $this->pasteService->store($dto);

        return view('pastes.ok');
    }

    /**
     * @param string $hash
     * @return Paste
     */
    public function getById(string $hash): Paste
    {
        return $this->pasteService->getById($hash);
    }

    public function create(): View
    {
        $lastPastes = $this->pasteService->getLast();
        $lastPastesUser = $this->pasteService->getAuthorLast(UserUtil::getId());
        $types = $this->typeService->getAll();
        $accessModifiers = $this->accessModifierService->getAll();
        $expirationTimes = $this->expirationTimeService->getAll();

        return view('pastes.create', compact('lastPastes', 'lastPastesUser', 'types', 'accessModifiers', 'expirationTimes'));
    }
}
