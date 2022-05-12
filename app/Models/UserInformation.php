<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserInformation extends BaseModel
{
    use HasFactory;

    protected $fillable = ['user_id', 'first_name', 'last_name', 'phone_number', 'avatar_path', 'position_id'];

    public function position()
    {
        return $this->belongsTo(Position::class);
    }
}
