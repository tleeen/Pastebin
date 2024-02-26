<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;


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
 * @property string|null $hash_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $deleted_at
 * @property-read AccessModifier|null $access_modifier
 * @property-read User|null $author
 * @property-read Collection<int, Complaint> $complaints
 * @property-read int|null $complaints_count
 * @property-read ExpirationTime|null $expiration_time
 * @property-read Type|null $type
 * @method static Builder|Paste newModelQuery()
 * @method static Builder|Paste newQuery()
 * @method static Builder|Paste onlyTrashed()
 * @method static Builder|Paste query()
 * @method static Builder|Paste find($id)
 * @method static Builder|Paste create($array)
 * @method static Builder|Paste where($value, $relation = null, $expression = null)
 * @method static Builder|Paste join($table, $fk, $relation, $pk)
 * @method static Builder|Paste whereAccessModifierId($value)
 * @method static Builder|Paste whereAuthorId($value)
 * @method static Builder|Paste whereBody($value)
 * @method static Builder|Paste whereCreatedAt($value)
 * @method static Builder|Paste whereDeletedAt($value)
 * @method static Builder|Paste whereExpirationTimeId($value)
 * @method static Builder|Paste whereId($value)
 * @method static Builder|Paste whereTitle($value)
 * @method static Builder|Paste whereTypeId($value)
 * @method static Builder|Paste whereUpdatedAt($value)
 * @method static Builder|Paste withTrashed()
 * @method static Builder|Paste withoutTrashed()
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
