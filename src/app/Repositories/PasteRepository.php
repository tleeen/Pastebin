<?php

namespace App\Repositories;

use App\DTO\PasteDTO;
use App\Models\Paste;
use App\Repositories\Interfaces\PasteRepositoryInterface;
use Auth;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Builder;
use  Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;

class PasteRepository implements PasteRepositoryInterface
{
    /**
     * @return Collection<int, Paste>
     */
    public function getAll(): Collection
    {
        return Paste::all();
    }

    /**
     * @param int $id
     * @return void
     */
    public function delete(int $id): void
    {
        $user = Paste::find($id);
        $user->delete();
    }

    /**
     * @param int $id
     * @return LengthAwarePaginator
     */
    public function getAuthor(int $id): LengthAwarePaginator
    {
        return $this::rulesForAuthorPastes($id)
            ->paginate(10);
    }

    /**
     * @param int $id
     * @return Collection<int, Paste>
     */
    public function getAuthorLast(int $id): Collection
    {
        return $this::rulesForAuthorPastes($id)
            ->latest()
            ->take(10)
            ->get();
    }

    /**
     * @return LengthAwarePaginator
     */
    public function getAllPaginate(): LengthAwarePaginator
    {
        return $this::rulesForAllPares()
            ->paginate(10);
    }

    /**
     * @param int $id
     * @return Paste
     */
    public function getById(int $id): Paste
    {
        return Paste::join('expiration_times', 'pastes.expiration_time_id', '=', 'expiration_times.id')
            ->where('pastes.created_at', '>', DB::raw('now() - INTERVAL expiration_times.volume MINUTE - INTERVAL 7 HOUR'))
            ->select('pastes.*')
            ->where(function ($query){
                $query->whereHas('access_modifier', function ($query){
                    $query->whereIn('title', ['public', 'unlisted']);})
                    ->orWhere('author_id', Auth::id())
                    ->where(function ($query){
                        $query->WhereHas('access_modifier', function ($query) {
                            $query->where('title', 'private');})
                            ->orWhereHas('access_modifier', function ($query) {
                                $query->where('title', 'unlisted ');});
                    });
            })
            ->find($id);
    }

    /**
     * @return Collection<int, Paste>
     */
    public function getLast(): Collection
    {
        return $this::rulesForAllPares()
            ->latest()
            ->take(10)
            ->get();
    }

    /**
     * @param PasteDTO $DTO
     * @return Paste
     */
    public function store(PasteDTO $DTO): Paste
    {
        return Paste::create([
            'title' => $DTO->title,
            'body' => $DTO->body,
            'type_id' => $DTO->typeId,
            'access_modifier_id' => $DTO->accessModifierId,
            'expiration_time_id' => $DTO->expirationTimeId,
            'author_id' => Auth::id()
        ]);
    }

    /**
     * @param int $id
     * @return Builder
     */
    public static function rulesForAuthorPastes(int $id): Builder
    {
        return Paste::where('author_id', $id)
            ->join('expiration_times', 'pastes.expiration_time_id', '=', 'expiration_times.id')
            ->where('pastes.created_at', '>', DB::raw('now() - INTERVAL expiration_times.volume MINUTE - INTERVAL 7 HOUR'))
            ->select('pastes.*');
    }

    /**
     * @return Builder
     */
    private static function rulesForAllPares(): Builder
    {
        return Paste::query()
        ->join('expiration_times', 'pastes.expiration_time_id', '=', 'expiration_times.id')
            ->where('pastes.created_at', '>', DB::raw('now() - INTERVAL expiration_times.volume MINUTE - INTERVAL 7 HOUR'))
            ->select('pastes.*')
            ->where(function ($query) {
                $query->whereHas('access_modifier', function ($query) {
                    $query->where('title', 'public');
                })
                    ->orWhere('author_id', Auth::id())
                    ->where(function ($query) {
                        $query->whereHas('access_modifier', function ($query) {
                            $query->where('title', 'private');
                        })
                            ->orWhereHas('access_modifier', function ($query) {
                                $query->where('title', 'unlisted ');
                            });
                    });
            });
    }
}
