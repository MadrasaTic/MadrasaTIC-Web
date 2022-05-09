<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\User;

class Service extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'parent_id'];
    
    public function category()
    {
    return $this->belongsTo(Category::class);
    }

    public function responsable()
    {
        return $this->belongsTo(User::class, 'parent_id');
    }

}
