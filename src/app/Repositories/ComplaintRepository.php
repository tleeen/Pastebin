<?php

namespace App\Repositories;

use App\DTO\ComplaintDTO;
use App\Models\Complaint;
use App\Repositories\Interfaces\ComplaintRepositoryInterface;

class ComplaintRepository implements ComplaintRepositoryInterface
{
    /**
     * @param ComplaintDTO $DTO
     * @return void
     */
    public function store(ComplaintDTO $DTO): void
    {
        Complaint::create([
            'body' => $DTO->body,
            'paste_id' => $DTO->pasteId
        ]);
    }
}
