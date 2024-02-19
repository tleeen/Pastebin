<?php

namespace App\Services\interfaces;

use App\DTO\PasteDTO;
use App\Models\Paste;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface PasteServiceInterface
{
    /**
     * @return Collection<int, Paste>
     */
    public function getAll(): Collection;

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

    public function getAuthorLast(int $id);

    public function getAuthor(int $id);
}
