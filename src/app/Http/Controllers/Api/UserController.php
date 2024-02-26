<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Http\Resources\PasteResource;
use App\Http\Resources\UserResource;
use App\Services\interfaces\PasteServiceInterface;
use App\Services\interfaces\UserServiceInterface;
use App\Utils\HashUtil;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class UserController extends Controller
{
    /**
     * @param UserServiceInterface $userService
     * @param PasteServiceInterface $pasteService
     */
    public function __construct(private readonly UserServiceInterface  $userService,
                                private readonly PasteServiceInterface $pasteService){}


    /**
     * @param int $id
     * @return AnonymousResourceCollection
     */
    public function pastes(int $id): AnonymousResourceCollection
    {
        return PasteResource::collection($this->pasteService->getAuthor($id));
    }

    /**
     * @param int $id
     * @return AnonymousResourceCollection
     */
    public function lastPastes(int $id): AnonymousResourceCollection
    {
        return PasteResource::collection($this->pasteService->getAuthorLast($id));
    }

    /**
     * @return AnonymousResourceCollection
     */
    public function index(): AnonymousResourceCollection
    {
        return UserResource::collection($this->userService->getAll());
    }

    /**
     * @param int $id
     * @return void
     */
    public function destroy(int $id): void
    {
        $this->userService->delete($id);
    }
}
