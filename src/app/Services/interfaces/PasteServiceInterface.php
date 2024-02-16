<?php

namespace App\Services\interfaces;

use App\Models\Paste;
use Illuminate\Pagination\LengthAwarePaginator;

interface PasteServiceInterface
{
    /**
     * @return LengthAwarePaginator
     */
    public function getAll(): LengthAwarePaginator;

    public function getById(string $id): Paste;
}
