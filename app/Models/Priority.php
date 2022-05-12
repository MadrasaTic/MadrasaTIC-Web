<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Priority extends BaseModel
{
    use HasFactory;

    protected $fillable = ['name', 'category_id'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    /**
     * Get all of the signalementVersionControl for the State
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function signalementVersionControl()
    {
        return $this->hasMany(SignalementVersionControl::class);
    }
}
