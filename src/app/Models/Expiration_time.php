<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Expiration_time extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'expiration_times';
    protected $guarded = false;

    /**
     * @return HasMany
     */
    public function posts(): HasMany
    {
        return $this->hasMany(Post::class,'expiration_time_id', 'id');
    }
}
