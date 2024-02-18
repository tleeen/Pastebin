<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Http\Requests\Paste\StoreRequest;
use App\Http\Resources\PasteResource;
use App\Models\Paste;
use App\Services\interfaces\PasteServiceInterface;
use App\Utils\HashUtil;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
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

    /**
     * @param string $hash
     * @return void
     */
    public function destroy(string $hash): void
    {
        $id = HashUtil::decipher($hash);

        $this->service->delete($id);
    }
}
