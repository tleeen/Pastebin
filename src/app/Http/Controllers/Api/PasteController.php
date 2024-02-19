<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Http\Requests\Paste\StoreRequest;
use App\Http\Resources\PasteResource;
use App\Services\interfaces\PasteServiceInterface;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class PasteController extends Controller
{
    /**
     * @param PasteServiceInterface $service
     */
    public function __construct(private readonly PasteServiceInterface $service){}

    /**
     * @return AnonymousResourceCollection
     */
    public function index(): AnonymousResourceCollection
    {
        return PasteResource::collection($this->service->getAll());
    }

    /**
     * @return AnonymousResourceCollection
     */
    public function last(): AnonymousResourceCollection
    {
        return PasteResource::collection($this->service->getLast());
    }

    /**
     * @param StoreRequest $request
     * @return PasteResource
     */
    public function store(StoreRequest $request): PasteResource
    {
        $dto = $request->getDto();

        $paste = $this->service->store($dto);

        return new PasteResource($paste);
    }

    /**
     * @param string $hash
     * @return PasteResource
     */
    public function getById(string $hash): PasteResource
    {
        return new PasteResource($this->service->getById($hash));
    }

    /**
     * @param string $hash
     * @return void
     */
    public function destroy(string $hash): void
    {
        $this->service->delete($hash);
    }

    /**
     * @return AnonymousResourceCollection
     */
    public function getAll(): AnonymousResourceCollection
    {
        return PasteResource::collection($this->service->getAllPaginate());
    }
}
