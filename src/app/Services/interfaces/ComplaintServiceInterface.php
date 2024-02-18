<?php

namespace App\Services\interfaces;

use App\DTO\ComplaintDTO;
use App\Models\Complaint;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface ComplaintServiceInterface
{
    /**
     * @param ComplaintDTO $DTO
     * @return Model
     */
    public function store(ComplaintDTO $DTO): Model;

    /**
     * @return Collection
     */
    public function getAll(): Collection;
}
