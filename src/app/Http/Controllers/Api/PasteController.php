<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Http\Requests\Paste\StoreRequest;
use App\Http\Resources\PasteResource;
use App\Models\Paste;
use App\Services\interfaces\PasteServiceInterface;
use App\Utils\HashUtil;
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
        $pastes = $this->service->getAll();

        $pastes->transform(function ($paste) {
            $paste->hash_id = HashUtil::encrypt($paste->id);
            return $paste;
        });

        return PasteResource::collection($pastes);
    }

    /**
     * @return AnonymousResourceCollection
     */
    public function last(): AnonymousResourceCollection
    {
        $pastes = $this->service->getLast();

        $pastes->transform(function ($paste) {
            $paste->hash_id = HashUtil::encrypt($paste->id);
            return $paste;
        });

        return PasteResource::collection($pastes);
    }

    /**
     * @param StoreRequest $request
     * @return PasteResource
     */
    public function store(StoreRequest $request): PasteResource
    {
        $dto = $request->getDto();

        $paste = $this->service->store($dto);

        $paste->hash_id = HashUtil::encrypt($paste->id);

        return new PasteResource($paste);
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

    /**
     * @param string $hash
     * @return void
     */
    public function destroy(string $hash): void
    {
        $id = HashUtil::decipher($hash);

        $this->service->delete($id);
    }

    /**
     * @return AnonymousResourceCollection
     */
    public function getAll(): AnonymousResourceCollection
    {
        $pastes = $this->service->getAllPaginate();

        $pastes->transform(function ($paste) {
            $paste->hash_id = HashUtil::encrypt($paste->id);
            return $paste;
        });

        return PasteResource::collection($pastes);
    }
}
