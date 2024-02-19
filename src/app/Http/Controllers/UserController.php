<?php

namespace App\Http\Controllers;

use App\Services\interfaces\PasteServiceInterface;
use App\Utils\HashUtil;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;

class UserController extends Controller
{
    public function __construct(private readonly PasteServiceInterface $pasteService){}

    /**
     * @param int $id
     * @return View
     */
    public function pastes(int $id): View
    {
        $pastes = $this->pasteService->getAuthor($id);

        return view('users.pastes', compact('pastes'));
    }

    /**
     * @param int $id
     * @return Collection
     */
    public function lastPastes(int $id): Collection
    {
        return $this->pasteService->getAuthorLast($id);
    }
}
