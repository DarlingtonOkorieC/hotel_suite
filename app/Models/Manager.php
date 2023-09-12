<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Manager extends Model
{
    use HasFactory;

    use Notifiable;

    protected $guard = 'admin';


    protected $fillable = ['user_id', 'business_ex', 'location', 'phone', 'photo'];

    /**
     * Get the user that owns the Manager
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get all of the hotels for the Manager
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function hotel()
    {
        return $this->hasOne(Hotel::class);
    }
}
