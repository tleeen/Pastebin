<?php

namespace App\Services\interfaces;

use App\DTO\PasteDTO;
use App\Models\Paste;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

interface PasteServiceInterface
{
    /**
     * @return Collection
     */
    public function getAll(): Collection;

    /**
     * @param string $id
     * @return Paste
     */
    public function getById(string $id): Paste;

    /**
     * @return Collection
     */
    public function getLast(): Collection;

    /**
     * @param PasteDTO $DTO
     * @return void
     */
    public function store(PasteDTO $DTO): void;
}
