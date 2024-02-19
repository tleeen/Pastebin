<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\ExpirationTime
 *
 * @property int $id
 * @property string $title
 * @property int $volume
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Paste> $pastes
 * @property-read int|null $pastes_count
 * @method static \Illuminate\Database\Eloquent\Builder|ExpirationTime newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ExpirationTime newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ExpirationTime onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|ExpirationTime query()
 * @method static \Illuminate\Database\Eloquent\Builder|ExpirationTime whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExpirationTime whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExpirationTime whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExpirationTime whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExpirationTime whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExpirationTime whereVolume($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExpirationTime withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|ExpirationTime withoutTrashed()
 * @mixin \Eloquent
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
