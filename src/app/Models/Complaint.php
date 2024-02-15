<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

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
