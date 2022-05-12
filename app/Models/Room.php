<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends BaseModel
{
    use HasFactory;

    /**
     * Get the bloc that owns the Room
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function bloc(): BelongsTo
    {
        return $this->belongsTo(Bloc::class);
    }

    /**
     * Get all of the signalement for the Room
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function signalement()
    {
        return $this->hasMany(Signalement::class);
    }
}
