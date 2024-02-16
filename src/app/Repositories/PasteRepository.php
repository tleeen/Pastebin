<?php

namespace App\Repositories;

use App\Models\Paste;
use App\Repositories\Interfaces\PasteRepositoryInterface;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

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
        Paste::where('id', $id)->delete();
    }

    /**
     * @return LengthAwarePaginator
     */
    public function getAllPaginate(): LengthAwarePaginator
    {
        $userId = (auth()->user()) ? auth()->user()->id : 0;

        $pastes = Paste::whereHas('access_modifier', function ($query) {
            $query->where('title', 'public');
        })->orWhereHas('access_modifier', function ($query) {
            $query->where('title', 'private');
        })->where('author_id', $userId)
            ->orWhereHas('access_modifier', function ($query) {
                $query->where('title', 'unlisted ');
            })->where('author_id', $userId)->paginate(3);

        return $pastes;
    }
}
