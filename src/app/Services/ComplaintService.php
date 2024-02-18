<?php

namespace App\Services;

use App\DTO\ComplaintDTO;
use App\Repositories\Interfaces\ComplaintRepositoryInterface;
use App\Services\interfaces\ComplaintServiceInterface;
use Illuminate\Database\Eloquent\Collection;

class ComplaintService implements ComplaintServiceInterface
{
    /**
     * @param ComplaintRepositoryInterface $repository
     */
    public function __construct(private readonly ComplaintRepositoryInterface $repository){}

    /**
     * @param ComplaintDTO $DTO
     * @return void
     */
    public function store(ComplaintDTO $DTO): void
    {
        $this->repository->store($DTO);
    }

    /**
     * @return Collection
     */
    public function getAll(): Collection
    {
        return $this->repository->getAll();
    }
}
