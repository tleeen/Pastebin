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
     * @return Complaint
     */
    public function store(ComplaintDTO $DTO): Complaint;

    /**
     * @return Collection<int, Complaint>
     */
    public function getAll(): Collection;
}
