<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bloc extends BaseModel
{
    use HasFactory;

    public function rooms()
    {
        return $this->hasMany(Room::class);
    }

    public static function boot() {
        parent::boot();
        self::deleting(function($bloc) {
            $bloc->rooms()->each(function($room) {
            $room->delete();
            });
        });
    }

    /**
     * Get the annexe that owns the Bloc
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function annexe()
    {
        return $this->belongsTo(Annexe::class);
    }

    /**
     * Get all of the signalement for the Bloc
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function signalement()
    {
        return $this->hasMany(Signalement::class);
    }
}
