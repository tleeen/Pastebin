<?php

namespace App\Repositories;

use App\DTO\ComplaintDTO;
use App\Models\Complaint;
use App\Repositories\Interfaces\ComplaintRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class ComplaintRepository implements ComplaintRepositoryInterface
{
    /**
     * @param ComplaintDTO $DTO
     * @return Model
     */
    public function store(ComplaintDTO $DTO): Model
    {
        return Complaint::create([
            'body' => $DTO->body,
            'paste_id' => $DTO->pasteId
        ]);
    }

    /**
     * @return Collection
     */
    public function getAll(): Collection
    {
        return Complaint::all();
    }
}
