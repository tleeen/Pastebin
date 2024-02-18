<?php

namespace App\Repositories;

use App\DTO\PasteDTO;
use App\Models\Paste;
use App\Repositories\Interfaces\PasteRepositoryInterface;
use App\Utils\UserUtil;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;

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
        $user = Paste::find($id);
        $user->delete();
    }

    /**
     * @return LengthAwarePaginator
     */
    public function getAllPaginate(): LengthAwarePaginator
    {
        return $this::rules()
            ->paginate(10);
    }

    /**
     * @param string $id
     * @return Paste
     */
    public function getById(string $id): Paste
    {
        $userId = UserUtil::getId();

        return Paste::join('expiration_times', 'pastes.expiration_time_id', '=', 'expiration_times.id')
            ->where('pastes.created_at', '>', DB::raw('now() - INTERVAL expiration_times.volume MINUTE - INTERVAL 7 HOUR'))
            ->select('pastes.*')
            ->where(function ($query) use ($userId){
                $query->whereHas('access_modifier', function ($query) use ($userId){
                    $query->whereIn('title', ['public', 'unlisted']);})
                    ->orWhere('author_id', $userId)
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
     * @return Collection
     */
    public function getLast(): Collection
    {
        return $this::rules()
            ->latest()
            ->take(10)
            ->get();
    }

    /**
     * @param PasteDTO $DTO
     * @return Model
     */
    public function store(PasteDTO $DTO): Model
    {
        $userId = UserUtil::getId();

        return Paste::create([
            'title' => $DTO->title,
            'body' => $DTO->body,
            'type_id' => $DTO->typeId,
            'access_modifier_id' => $DTO->accessModifierId,
            'expiration_time_id' => $DTO->expirationTimeId,
            'author_id' => ($userId === 0) ? null : $userId
        ]);
    }

    public static function rules(): Builder
    {
        $userId = UserUtil::getId();

        return Paste::join('expiration_times', 'pastes.expiration_time_id', '=', 'expiration_times.id')
            ->where('pastes.created_at', '>', DB::raw('now() - INTERVAL expiration_times.volume MINUTE - INTERVAL 7 HOUR'))
            ->select('pastes.*')
            ->where(function ($query) use ($userId){
                $query->whereHas('access_modifier', function ($query) use ($userId){
                    $query->where('title', 'public');})
                    ->orWhere('author_id', $userId)
                    ->where(function ($query){
                        $query->WhereHas('access_modifier', function ($query) {
                            $query->where('title', 'private');})
                            ->orWhereHas('access_modifier', function ($query) {
                                $query->where('title', 'unlisted ');});
                    });
            });
    }
}
