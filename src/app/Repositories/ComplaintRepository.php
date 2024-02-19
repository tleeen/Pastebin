<?php

namespace App\Repositories;

use App\DTO\ComplaintDTO;
use App\Models\Complaint;
use App\Repositories\Interfaces\ComplaintRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class ComplaintRepository implements ComplaintRepositoryInterface
{
    /**
     * @param ComplaintDTO $DTO
     * @return Complaint
     */
    public function store(ComplaintDTO $DTO): Complaint
    {
        return Complaint::create([
            'body' => $DTO->body,
            'paste_id' => $DTO->pasteId
        ]);
    }

    /**
     * @return Collection<int, Complaint>
     */
    public function getAll(): Collection
    {
        return Complaint::all();
    }
}
