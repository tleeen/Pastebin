<?php

namespace App\Services;

use App\DTO\PasteDTO;
use App\Models\Paste;
use App\Repositories\Interfaces\PasteRepositoryInterface;
use App\Services\interfaces\PasteServiceInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
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
    public function getAllPaginate(): LengthAwarePaginator
    {
        return $this->repository->getAllPaginate();
    }

    /**
     * @return Collection
     */
    public function getAll(): Collection
    {
        return $this->repository->getAll();
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
     * @return Model
     */
    public function store(PasteDTO $DTO): Model
    {
        return $this->repository->store($DTO);
    }

    /**
     * @param string $id
     * @return Paste
     */
    public function getById(string $id): Paste
    {
        return $this->repository->getById($id);
    }

    public function delete(string $id): void
    {
        $this->repository->delete($id);
    }
}
