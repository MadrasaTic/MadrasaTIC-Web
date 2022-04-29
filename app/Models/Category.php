<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Service;
use App\Models\Priority;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'parent_id', 'priority_default', 'description', 'services_associated'];
    protected $hidden = ['created_at', 'updated_at'];

    public function parent()
    {
    return $this->belongsTo(Category::class, 'parent_id');
    }

    public function children()
    {
    return $this->hasMany(Category::class, 'parent_id');
    }

    public function services()
    {
    return $this->hasMany(Service::class, 'services_associated');
    }

    public function priority()
    {
        return $this->hasOne(Priority::class);
    }
}
