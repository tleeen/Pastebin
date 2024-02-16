<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

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
