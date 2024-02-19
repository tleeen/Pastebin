<?php

namespace App\Http\Controllers;

use App\Http\Requests\Complaints\StoreRequest;
use App\Services\interfaces\ComplaintServiceInterface;
use App\Services\interfaces\PasteServiceInterface;
use Illuminate\Contracts\View\View;

class ComplaintController extends Controller
{
    public function __construct(
        private readonly ComplaintServiceInterface $complaintService,
        private readonly PasteServiceInterface $pasteService
    ){}

    /**
     * @param StoreRequest $request
     * @return View
     */
    public function store(StoreRequest $request): View
    {
        $dto = $request->getDto();

        $this->complaintService->store($dto);

        return view('complaints.ok');
    }

    /**
     * @param string $id
     * @return View
     */
    public function create(string $id): View
    {
        $paste = $this->pasteService->getById($id);

        return view('complaints.create', compact('paste'));
    }
}
