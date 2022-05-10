<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SignalementVersionControl extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'signalement_version_controls';

    /**
     * Get the signalement that owns the SignalementVersionControl
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function signalement(): BelongsTo
    {
        return $this->belongsTo(Signalement::class);
    }

    /**
     * Get the attachedTo that owns the SignalementVersionControl
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function attachedTo(): BelongsTo
    {
        return $this->belongsTo(Sinalement::class, 'attached_signalement_id');
    }

    /**
     * Get the state that owns the SignalementVersionControl
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function state(): BelongsTo
    {
        return $this->belongsTo(State::class);
    }

    /**
     * Get the category that owns the SignalementVersionControl
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Get the service that owns the SignalementVersionControl
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class);
    }

    /**
     * Get the priority that owns the SignalementVersionControl
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function priority(): BelongsTo
    {
        return $this->belongsTo(Proirity::class);
    }
}
