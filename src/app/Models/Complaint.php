<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;

/**
 * App\Models\Complaint
 *
 * @property int $id
 * @property string $body
 * @property int $paste_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $deleted_at
 * @property-read Paste|null $paste
 * @method static Builder|Complaint newModelQuery()
 * @method static Builder|Complaint newQuery()
 * @method static Builder|Complaint onlyTrashed()
 * @method static Builder|Complaint query()
 * @method static Builder|Complaint create($array)
 * @method static Builder|Complaint whereBody($value)
 * @method static Builder|Complaint whereCreatedAt($value)
 * @method static Builder|Complaint whereDeletedAt($value)
 * @method static Builder|Complaint whereId($value)
 * @method static Builder|Complaint wherePasteId($value)
 * @method static Builder|Complaint whereUpdatedAt($value)
 * @method static Builder|Complaint withTrashed()
 * @method static Builder|Complaint withoutTrashed()
 */
class Complaint extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'complaints';
    protected $guarded = false;

    /**
     * @return BelongsTo
     */
    public function paste(): BelongsTo
    {
        return $this->belongsTo(Paste::class, 'post_id', 'id');
    }
}
