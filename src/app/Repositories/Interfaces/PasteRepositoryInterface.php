<?php

namespace App\Repositories\Interfaces;
use Illuminate\Database\Eloquent\Collection;

interface PasteRepositoryInterface
{
    /**
     * @return Collection
     */
    public function getAll(): Collection;

    /**
     * @param string $id
     * @return void
     */
    public function delete(string $id): void;
}
