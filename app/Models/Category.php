<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Service;
use App\Models\Priority;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', /*'parent_id',*/ 'priority_id', 'description', 'service_id'];
    protected $hidden = ['created_at', 'updated_at'];

    /*public function parent()
    {
    return $this->belongsTo(Category::class, 'parent_id');
    }

    public function children()
    {
    return $this->hasMany(Category::class, 'parent_id');
    }*/

    public function services()
    {
    return $this->belongsTo(Service::class, 'service_id');
    }

    public function priority()
    {
        return $this->belongsTo(Priority::class);
    }
}
