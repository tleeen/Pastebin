<?php

namespace App\Http\Controllers;

use App\Services\interfaces\UserServiceInterface;
use App\Utils\HashUtil;
use Illuminate\Contracts\View\View;

class UserController extends Controller
{
    /**
     * @param UserServiceInterface $service
     */
    public function __construct(private readonly UserServiceInterface $service){}

    /**
     * @param string $id
     * @return View
     */
    public function pastes(string $id): View
    {
        $pastes = $this->service->getAllPastes($id);

        $pastes->transform(function ($paste) {
            $paste->hash_id = HashUtil::encrypt($paste->id);
            return $paste;
        });

        return view('users.pastes', compact('pastes'));
    }
}
