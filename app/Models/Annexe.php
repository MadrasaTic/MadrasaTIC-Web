<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Annexe extends BaseModel
{
    use HasFactory;

    public function blocs()
    {
        return $this->hasMany(Bloc::class);
    }

    public static function boot() {
        parent::boot();
        self::deleting(function($annexe) {
            $annexe->blocs()->each(function($bloc) {
            $bloc->delete();
            });
        });
    }

    /**
     * Get all of the signalement for the Annexe
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function signalement()
    {
        return $this->hasMany(Signalement::class);
    }
}
