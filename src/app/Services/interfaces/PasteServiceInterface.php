<?php

namespace App\Services\interfaces;

use App\DTO\PasteDTO;
use App\Models\Paste;
use Illuminate\Database\Eloquent\Collection;
use  Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface PasteServiceInterface
{
    /**
     * @return Collection<int, Paste>
     */
    public function getAll(): Collection;

    /**
     * @return LengthAwarePaginator
     */
    public function getAllPaginate(): LengthAwarePaginator;

    /**
     * @param string $hash
     * @return Paste
     */
    public function getById(string $hash): Paste;

    /**
     * @return Collection<int, Paste>
     */
    public function getLast(): Collection;

    /**
     * @param PasteDTO $DTO
     * @return Paste
     */
    public function store(PasteDTO $DTO): Paste;

    /**
     * @param string $hash
     * @return void
     */
    public function delete(string $hash): void;

    /**
     * @param int $id
     * @return Collection<int, Paste>
     */
    public function getAuthorLast(int $id): Collection;

    /**
     * @param int $id
     * @return LengthAwarePaginator
     */
    public function getAuthor(int $id): LengthAwarePaginator;
}
