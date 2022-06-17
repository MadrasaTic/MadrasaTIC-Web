<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Auth;

class Signalement extends BaseModel
{
    use HasFactory;
    use SoftDeletes;

    protected $user_id;
    protected $table = 'signalements';

    /**
     * The relationships that should always be loaded.
     *
     * @var array
     */
    protected $with = ['annexe', 'bloc', 'room', 'creator', 'lastSignalementVC'];


    /**
     * Get all of the signalementVersionControl for the Signalement
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function signalementVersionControl()
    {
        return $this->hasMany(SignalementVersionControl::class);
    }

    /**
     * Get all of the signalementVersionControl for the Signalement
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function lastSignalementVC()
    {
        return $this->hasOne(SignalementVersionControl::class)->latestOfMany();
    }

    /**
     * Get all of the attachedSignalement for the Signalement
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function attachedSignalement()
    {
        return $this->hasMany(Signalement::class, 'attached_signalement_id', 'id');
    }

    /**
     * Get the creator that owns the Signalement
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function creator()
    {
        return $this->belongsTo(User::class, 'creator_id');
    }

    /**
     * Get the annexe that owns the Signalement
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function annexe()
    {
        return $this->belongsTo(Annexe::class, 'annexe_id', 'id');
    }

    /**
     * Get the infrastructure that owns the Signalement
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function bloc()
    {
        return $this->belongsTo(Bloc::class, 'bloc_id', 'id');
    }

    /**
     * Get the infrastructure that owns the Signalement
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function room()
    {
        return $this->belongsTo(Room::class, 'room_id', 'id');
    }

    /**
     * The savedBy that belong to the Signalement
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function savedBy()
    {
        return $this->belongsToMany(User::class, 'user_saved_signalement', 'signalement_id', 'user_id')
            ->withTimestamps();
    }

    /**
     * The reactedBy that belong to the Signalement
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function reactedBy()
    {
        return $this->belongsToMany(User::class, 'user_reaction_signalement', 'signalement_id', 'user_id')
            ->withPivot('reaction_type')
            ->withTimestamps();
    }

    /**
     * The isSaved that belong to the Signalement
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function isSaved()
    {
        $this->user_id = Auth::user()->id;
        return $this->belongsToMany(User::class, 'user_saved_signalement', 'signalement_id', 'user_id')
            ->where("user_id", $this->user_id)
            ->withTimestamps();
    }

    /**
     * The isReacted that belong to the Signalement
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function isReacted()
    {
        $this->user_id = Auth::user()->id;
        return $this->belongsToMany(User::class, 'user_reaction_signalement', 'signalement_id', 'user_id')
            ->withPivot('reaction_type')
            ->withTimestamps()
            ->where("users.id", $this->user_id);
    }

    /**
     * Get all of the report for the Signalement
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function report()
    {
        return $this->hasOne(Report::class)->latestOfMany();
    }
}
