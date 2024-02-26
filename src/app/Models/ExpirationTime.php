<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;

/**
 * App\Models\ExpirationTime
 *
 * @property int $id
 * @property string $title
 * @property int $volume
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $deleted_at
 * @property-read Collection<int, Paste> $pastes
 * @property-read int|null $pastes_count
 * @method static Builder|ExpirationTime newModelQuery()
 * @method static Builder|ExpirationTime newQuery()
 * @method static Builder|ExpirationTime onlyTrashed()
 * @method static Builder|ExpirationTime query()
 * @method static Builder|ExpirationTime whereCreatedAt($value)
 * @method static Builder|ExpirationTime whereDeletedAt($value)
 * @method static Builder|ExpirationTime whereId($value)
 * @method static Builder|ExpirationTime whereTitle($value)
 * @method static Builder|ExpirationTime whereUpdatedAt($value)
 * @method static Builder|ExpirationTime whereVolume($value)
 * @method static Builder|ExpirationTime withTrashed()
 * @method static Builder|ExpirationTime withoutTrashed()
 */
class ExpirationTime extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'expiration_times';
    protected $guarded = false;

    /**
     * @return HasMany
     */
    public function pastes(): HasMany
    {
        return $this->hasMany(Paste::class,'expiration_time_id', 'id');
    }
}
