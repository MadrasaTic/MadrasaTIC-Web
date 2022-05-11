<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Priority extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'category_id', 'weight'];

    public function category()
    {
        return $this->hasOne(Category::class);
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
