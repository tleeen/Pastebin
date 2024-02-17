<?php

namespace App\Services\interfaces;

use App\DTO\ComplaintDTO;
use App\Models\Complaint;

interface ComplaintServiceInterface
{
    /**
     * @param ComplaintDTO $DTO
     * @return void
     */
    public function store(ComplaintDTO $DTO): void;
}
