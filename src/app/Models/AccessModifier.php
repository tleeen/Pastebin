<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\AccessModifier
 *
 * @property int $id
 * @property string $title
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Paste> $pastes
 * @property-read int|null $pastes_count
 * @method static \Illuminate\Database\Eloquent\Builder|AccessModifier newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AccessModifier newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AccessModifier onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|AccessModifier query()
 * @method static \Illuminate\Database\Eloquent\Builder|AccessModifier whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AccessModifier whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AccessModifier whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AccessModifier whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AccessModifier whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AccessModifier withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|AccessModifier withoutTrashed()
 * @mixin \Eloquent
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
