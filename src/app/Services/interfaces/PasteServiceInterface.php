<?php

namespace App\Services\interfaces;

use App\Models\Paste;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

interface PasteServiceInterface
{
    /**
     * @return LengthAwarePaginator
     */
    public function getAll(): LengthAwarePaginator;

    /**
     * @param string $id
     * @return Paste
     */
    public function getById(string $id): Paste;

    /**
     * @return Collection
     */
    public function getLast(): Collection;
}
