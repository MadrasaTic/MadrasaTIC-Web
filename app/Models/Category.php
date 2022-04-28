<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillble = ['name', 'parent_id', 'priority_default', 'description', "service_id"];
    protected $hidden = ['created_at', 'updated_at'];

    public function parent()
    {
    return $this->belongsTo(Category::class, 'parent_id');
    }

    public function children()
    {
    return $this->hasMany(Category::class, 'parent_id');
    }
}
