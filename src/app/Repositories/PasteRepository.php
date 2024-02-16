<?php

namespace App\Repositories;

use App\Models\Paste;
use App\Repositories\Interfaces\PasteRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use TCG\Voyager\Models\Post;

class PasteRepository implements PasteRepositoryInterface
{
    /**
     * @return Collection
     */
    public function getAll(): Collection
    {
        return Paste::all();
    }

    /**
     * @param string $id
     * @return void
     */
    public function delete(string $id): void
    {
        Post::where('id', $id)->delete();
    }
}
