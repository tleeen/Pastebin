<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Interfaces\UserRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;

class UserRepository implements UserRepositoryInterface
{
    /**
     * @param string $id
     * @return LengthAwarePaginator
     */
    public function getAllPaginatePastes(string $id): LengthAwarePaginator
    {
        return $this::rules($id)
            ->paginate(10);
    }

    /**
     * @param string $id
     * @return Collection
     */
    public function getLastPastes(string $id): Collection
    {
        return $this::rules($id)
            ->latest()
            ->take(10)
            ->get();
    }

    /**
     * @param string $id
     * @return HasMany
     */
    static private function rules(string $id): HasMany
    {
        return User::find($id)
            ->pastes()
            ->join('expiration_times', 'pastes.expiration_time_id', '=', 'expiration_times.id')
            ->where('pastes.created_at', '>', DB::raw('now() - INTERVAL expiration_times.volume MINUTE - INTERVAL 7 HOUR'))
            ->select('pastes.*');
    }

    /**
     * @return Collection
     */
    public function getAll(): Collection
    {
        return User::all();
    }
}
