<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Access_modifier extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'access_modifiers';
    protected $guarded = false;

    /**
     * @return HasMany
     */
    public function posts(): HasMany
    {
        return $this->hasMany(Post::class,'access_modifier_id', 'id');
    }
}
