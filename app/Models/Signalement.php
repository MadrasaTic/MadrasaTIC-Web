<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
    public function signalementVersionControl(): HasMany
    {
        return $this->hasMany(SignalementVersionControl::class);
    }

    /**
     * Get all of the attachedSignalement for the Signalement
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function attachedSignalement(): HasMany
    {
        return $this->hasMany(Signalement::class, 'attached_signalement_id', 'id');
    }

    /**
     * Get the creator that owns the Signalement
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'creator_id');
    }

    /**
     * Get the infrastructure that owns the Signalement
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function infrastructure(): BelongsTo
    {
        if ($this->infrastructure_type == "annexe") {
            return $this->belongsTo(Annexe::class, 'infrastructure_id', 'id');
        } else if ($this->infrastructure_type == "bloc") {
            return $this->belongsTo(Bloc::class, 'infrastructure_id', 'id');
        } else if ($this->infrastructure_type == "salle") {
            return $this->belongsTo(Room::class, 'infrastructure_id', 'id');
        }
    }
}
