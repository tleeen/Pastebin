<?php

namespace App\Services;

use App\DTO\PasteDTO;
use App\Models\Paste;
use App\Repositories\Interfaces\PasteRepositoryInterface;
use App\Services\interfaces\PasteServiceInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class PasteService implements PasteServiceInterface
{
    /**
     * @param PasteRepositoryInterface $repository
     */
    public function __construct(private readonly PasteRepositoryInterface $repository){}

    /**
     * @return LengthAwarePaginator
     */
    public function getAll(): LengthAwarePaginator
    {
        return $this->repository->getAllPaginate();
    }

    /**
     * @return Collection
     */
    public function getLast(): Collection
    {
        return $this->repository->getLast();
    }

    /**
     * @param PasteDTO $DTO
     * @return void
     */
    public function store(PasteDTO $DTO): void
    {
        $this->repository->store($DTO);
    }

    /**
     * @param string $id
     * @return Paste
     */
    public function getById(string $id): Paste
    {
        return $this->repository->getById($id);
    }
}
