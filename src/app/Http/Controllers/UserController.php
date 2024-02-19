<?php

namespace App\Http\Controllers;

use App\Services\interfaces\PasteServiceInterface;
use Illuminate\Contracts\View\View;

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
}
