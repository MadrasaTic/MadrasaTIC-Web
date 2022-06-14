<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SignalementVersionControl extends BaseModel
{
    use HasFactory;

    protected $table = 'signalement_version_controls';

    /**
     * The relationships that should always be loaded.
     *
     * @var array
     */
    protected $with = ['state', 'category', 'service', 'priority'];

    /**
     * Get the signalement that owns the SignalementVersionControl
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function signalement()
    {
        return $this->belongsTo(Signalement::class);
    }

    /**
     * Get the attachedTo that owns the SignalementVersionControl
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function attachedTo()
    {
        return $this->belongsTo(Signalement::class, 'attached_signalement_id');
    }

    /**
     * Get the state that owns the SignalementVersionControl
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function state()
    {
        return $this->belongsTo(State::class);
    }

    /**
     * Get the category that owns the SignalementVersionControl
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Get the service that owns the SignalementVersionControl
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    /**
     * Get the priority that owns the SignalementVersionControl
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function priority()
    {
        return $this->belongsTo(Priority::class);
    }

    /**
     * Get the updatedBy that owns the SignalementVersionControl
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by', 'id');
    }
}
