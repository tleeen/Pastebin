<?php

namespace App\Repositories\Interfaces;
use App\DTO\PasteDTO;
use App\Models\Paste;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

interface PasteRepositoryInterface
{
    /**
     * @return Collection<int, Paste>
     */
    public function getAll(): Collection;

    /**
     * @param int $id
     * @return void
     */
    public function delete(int $id): void;

    /**
     * @return LengthAwarePaginator
     */
    public function getAllPaginate(): LengthAwarePaginator;

    /**
     * @param int $id
     * @return Paste
     */
    public function getById(int $id): Paste;

    /**
     * @return \Illuminate\Support\Collection<int, Paste>
     */
    public function getLast(): \Illuminate\Support\Collection;

    /**
     * @param PasteDTO $DTO
     * @return Paste
     */
    public function store(PasteDTO $DTO): Paste;

    /**
     * @param int $id
     * @return \Illuminate\Support\Collection<int, Paste>
     */
    public function getAuthorLast(int $id): \Illuminate\Support\Collection;

    /**
     * @param int $id
     * @return LengthAwarePaginator
     */
    public function getAuthor(int $id): LengthAwarePaginator;
}
