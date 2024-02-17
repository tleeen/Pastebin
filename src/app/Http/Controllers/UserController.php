<?php

namespace App\Http\Controllers;

use App\Services\interfaces\UserServiceInterface;
use App\Utils\HashUtil;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;

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

    /**
     * @param string $id
     * @return Collection
     */
    public function lastPastes(string $id): Collection
    {
        $pastes = $this->service->getLastPastes($id);

        $pastes->transform(function ($paste) {
            $paste->hash_id = HashUtil::encrypt($paste->id);
            return $paste;
        });

        return $pastes;
    }
}
