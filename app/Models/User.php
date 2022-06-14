<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Laratrust\Traits\LaratrustUserTrait;

class User extends Authenticatable
{
    use LaratrustUserTrait;
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'google_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function providers()
    {
        return $this->hasMany(Provider::class,'user_id','id');
    }

    public function userInformation()
    {
        return $this->hasOne(UserInformation::class);
    }

    /**
     * The savedSignalements that belong to the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function savedSignalements()
    {
        return $this->belongsToMany(Signalement::class, 'user_saved_signalement', 'user_id', 'signalement_id')
            ->withTimestamps();
    }

    /**
     * The reactedSignalements that belong to the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function reactedSignalements()
    {
        return $this->belongsToMany(Signalement::class, 'user_reaction_signalement', 'user_id', 'signalement_id')
        ->withPivot('reaction_type')
        ->withTimestamps();
    }

    public function annonce()
    {
        return $this->hasMany(Annonce::class);
    }
}
