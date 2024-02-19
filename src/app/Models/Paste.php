<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * App\Models\Paste
 *
 * @property int $id
 * @property string $title
 * @property string $body
 * @property int $type_id
 * @property int|null $author_id
 * @property int $access_modifier_id
 * @property int $expiration_time_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\AccessModifier|null $access_modifier
 * @property-read \App\Models\User|null $author
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Complaint> $complaints
 * @property-read int|null $complaints_count
 * @property-read \App\Models\ExpirationTime|null $expiration_time
 * @property-read \App\Models\Type|null $type
 * @method static \Illuminate\Database\Eloquent\Builder|Paste newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Paste newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Paste onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Paste query()
 * @method static \Illuminate\Database\Eloquent\Builder|Paste whereAccessModifierId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Paste whereAuthorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Paste whereBody($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Paste whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Paste whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Paste whereExpirationTimeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Paste whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Paste whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Paste whereTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Paste whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Paste withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Paste withoutTrashed()
 * @mixin \Eloquent
 */
class Paste extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'pastes';
    protected $guarded = false;

    /**
     * @return BelongsTo
     */
    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id', 'id');
    }

    /**
     * @return BelongsTo
     */
    public function type(): BelongsTo
    {
        return $this->belongsTo(Type::class, 'type_id', 'id');
    }

    /**
     * @return BelongsTo
     */
    public function access_modifier(): BelongsTo
    {
        return $this->belongsTo(AccessModifier::class, 'access_modifier_id', 'id');
    }

    /**
     * @return BelongsTo
     */
    public function expiration_time(): BelongsTo
    {
        return $this->belongsTo(ExpirationTime::class, 'expiration_time_id', 'id');
    }

    /**
     * @return HasMany
     */
    public function complaints(): HasMany
    {
        return $this->hasMany(Complaint::class, 'post_id', 'id');
    }
}
