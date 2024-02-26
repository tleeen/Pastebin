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
 * App\Models\AccessModifier
 *
 * @property int $id
 * @property string $title
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $deleted_at
 * @property-read Collection<int, Paste> $pastes
 * @property-read int|null $pastes_count
 * @method static Builder|AccessModifier newModelQuery()
 * @method static Builder|AccessModifier newQuery()
 * @method static Builder|AccessModifier onlyTrashed()
 * @method static Builder|AccessModifier query()
 * @method static Builder|AccessModifier whereCreatedAt($value)
 * @method static Builder|AccessModifier whereDeletedAt($value)
 * @method static Builder|AccessModifier whereId($value)
 * @method static Builder|AccessModifier whereTitle($value)
 * @method static Builder|AccessModifier whereUpdatedAt($value)
 * @method static Builder|AccessModifier withTrashed()
 * @method static Builder|AccessModifier withoutTrashed()
 */
class AccessModifier extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'access_modifiers';
    protected $guarded = false;

    /**
     * @return HasMany
     */
    public function pastes(): HasMany
    {
        return $this->hasMany(Paste::class,'access_modifier_id', 'id');
    }
}
