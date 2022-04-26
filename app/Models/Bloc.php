<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bloc extends Model
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
}
