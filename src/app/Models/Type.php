<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Type
 *
 * @property int $id
 * @property string $title
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Paste> $pastes
 * @property-read int|null $pastes_count
 * @method static \Illuminate\Database\Eloquent\Builder|Type newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Type newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Type onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Type query()
 * @method static \Illuminate\Database\Eloquent\Builder|Type whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Type whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Type whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Type whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Type whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Type withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Type withoutTrashed()
 * @mixin \Eloquent
 */
class Type extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'types';
    protected $guarded = false;

    /**
     * @return HasMany
     */
    public function pastes(): HasMany
    {
        return $this->hasMany(Paste::class,'type_id', 'id');
    }
}
