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
 * App\Models\Type
 *
 * @property int $id
 * @property string $title
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $deleted_at
 * @property-read Collection<int, Paste> $pastes
 * @property-read int|null $pastes_count
 * @method static Builder|Type newModelQuery()
 * @method static Builder|Type newQuery()
 * @method static Builder|Type onlyTrashed()
 * @method static Builder|Type query()
 * @method static Builder|Type whereCreatedAt($value)
 * @method static Builder|Type whereDeletedAt($value)
 * @method static Builder|Type whereId($value)
 * @method static Builder|Type whereTitle($value)
 * @method static Builder|Type whereUpdatedAt($value)
 * @method static Builder|Type withTrashed()
 * @method static Builder|Type withoutTrashed()
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
