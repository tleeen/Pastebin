<?php

namespace App\Services;

use App\Models\Paste;
use App\Repositories\Interfaces\PasteRepositoryInterface;
use App\Services\interfaces\PasteServiceInterface;
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

    public function getLast()
    {

    }

    public function create(){

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
