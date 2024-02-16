<?php

namespace App\Services\interfaces;

use Illuminate\Pagination\LengthAwarePaginator;

interface PasteServiceInterface
{
    /**
     * @return LengthAwarePaginator
     */
    public function getAll(): LengthAwarePaginator;
}
