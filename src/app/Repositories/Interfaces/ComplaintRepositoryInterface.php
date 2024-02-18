<?php

namespace App\Repositories\Interfaces;

use App\DTO\ComplaintDTO;
use App\Models\Complaint;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface ComplaintRepositoryInterface
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
