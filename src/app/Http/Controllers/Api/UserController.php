<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Http\Resources\PasteResource;
use App\Http\Resources\UserResource;
use App\Services\interfaces\UserServiceInterface;
use App\Utils\HashUtil;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class UserController extends Controller
{
    /**
     * @param UserServiceInterface $service
     */
    public function __construct(private readonly UserServiceInterface $service){}


    /**
     * @param string $id
     * @return AnonymousResourceCollection
     */
    public function pastes(string $id): AnonymousResourceCollection
    {
        $pastes = $this->service->getAllPastes($id);

        $pastes->transform(function ($paste) {
            $paste->hash_id = HashUtil::encrypt($paste->id);
            return $paste;
        });

        return PasteResource::collection($pastes);
    }

    /**
     * @param string $id
     * @return AnonymousResourceCollection
     */
    public function lastPastes(string $id): AnonymousResourceCollection
    {
        $pastes = $this->service->getLastPastes($id);

        $pastes->transform(function ($paste) {
            $paste->hash_id = HashUtil::encrypt($paste->id);
            return $paste;
        });

        return PasteResource::collection($pastes);
    }

    /**
     * @return AnonymousResourceCollection
     */
    public function index(): AnonymousResourceCollection
    {
        return UserResource::collection($this->service->getAll());
    }

    /**
     * @param string $id
     * @return void
     */
    public function destroy(string $id): void
    {
        $this->service->delete($id);
    }
}
