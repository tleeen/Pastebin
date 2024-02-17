<?php

namespace App\Repositories\Interfaces;

use App\DTO\ComplaintDTO;
use App\Models\Complaint;

interface ComplaintRepositoryInterface
{
    /**
     * @param ComplaintDTO $DTO
     * @return void
     */
    public function store(ComplaintDTO $DTO): void;
}
