<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Auth;

class Annonce extends Model
{
    protected $fillable = [
        'user_id','title', 'description','beginDate','endDate', 'image',
    ];
    use HasFactory , SoftDeletes;
     /**
     * The relationships that should always be loaded.
     *
     * @var array
     */
    protected $with = ['user'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
