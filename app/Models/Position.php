<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends BaseModel
{
    use HasFactory;

    protected $fillable = ['name'];
    protected $hidden = ['created_at','updated_at'];
}
