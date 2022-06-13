<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\User;

class Service extends BaseModel
{
    use HasFactory;

    /**
     * The relationships that should always be loaded.
     *
     * @var array
     */
    protected $with = ['responsable'];

    protected $fillable = ['name', 'parent_id'];

    public function category()
    {
    return $this->hasOne(Category::class);
    }

    public function responsable()
    {
        return $this->belongsTo(User::class, 'parent_id');
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
