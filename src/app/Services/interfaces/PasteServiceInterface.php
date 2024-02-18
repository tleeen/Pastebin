<?php

namespace App\Services\interfaces;

use App\DTO\PasteDTO;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface PasteServiceInterface
{
    /**
     * @return Collection
     */
    public function getAll(): Collection;

    /**
     * @param string $id
     * @return Model
     */
    public function getById(string $id): Model;

    /**
     * @return Collection
     */
    public function getLast(): Collection;

    /**
     * @param PasteDTO $DTO
     * @return Model
     */
    public function store(PasteDTO $DTO): Model;

    /**
     * @param string $id
     * @return void
     */
    public function delete(string $id): void;
}
