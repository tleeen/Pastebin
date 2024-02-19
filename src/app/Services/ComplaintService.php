<?php

namespace App\Services;

use App\DTO\ComplaintDTO;
use App\Models\Complaint;
use App\Repositories\Interfaces\ComplaintRepositoryInterface;
use App\Services\interfaces\ComplaintServiceInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class ComplaintService implements ComplaintServiceInterface
{
    /**
     * @param ComplaintRepositoryInterface $repository
     */
    public function __construct(private readonly ComplaintRepositoryInterface $repository){}

    /**
     * @param ComplaintDTO $DTO
     * @return Complaint
     */
    public function store(ComplaintDTO $DTO): Complaint
    {
        return $this->repository->store($DTO);
    }

    /**
     * @return Collection<int, Complaint>
     */
    public function getAll(): Collection
    {
        return $this->repository->getAll();
    }
}
