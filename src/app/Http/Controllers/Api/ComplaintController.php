<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Http\Requests\Complaints\StoreRequest;
use App\Http\Resources\ComplaintResource;
use App\Services\interfaces\ComplaintServiceInterface;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ComplaintController extends Controller
{
    public function __construct(private readonly ComplaintServiceInterface $service){}

    /**
     * @param StoreRequest $request
     * @return View
     */
    public function store(StoreRequest $request): View
    {
        $dto = $request->getDto();

        $this->service->store($dto);

        return view('complaints.ok');
    }

    /**
     * @return AnonymousResourceCollection
     */
    public function index(): AnonymousResourceCollection
    {
        return ComplaintResource::collection($this->service->getAll());
    }
}
