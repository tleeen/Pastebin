<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Complaint
 *
 * @property int $id
 * @property string $body
 * @property int $paste_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Paste|null $paste
 * @method static \Illuminate\Database\Eloquent\Builder|Complaint newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Complaint newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Complaint onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Complaint query()
 * @method static \Illuminate\Database\Eloquent\Builder|Complaint whereBody($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Complaint whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Complaint whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Complaint whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Complaint wherePasteId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Complaint whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Complaint withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Complaint withoutTrashed()
 * @mixin \Eloquent
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
