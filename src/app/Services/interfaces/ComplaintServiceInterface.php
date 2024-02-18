<?php

namespace App\Services\interfaces;

use App\DTO\ComplaintDTO;
use App\Models\Complaint;
use Illuminate\Database\Eloquent\Collection;

interface ComplaintServiceInterface
{
    /**
     * @param ComplaintDTO $DTO
     * @return void
     */
    public function store(ComplaintDTO $DTO): void;

    /**
     * @return Collection
     */
    public function getAll(): Collection;
}
