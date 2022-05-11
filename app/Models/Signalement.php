<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Signalement extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'signalements';

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
}
