<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booker extends Model
{
    use HasFactory;
    
    protected $fillable = ['user_id', 'hotel_id', 'location', 'phone', 'opened', 'photo', 'requirement', 'duration'];

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
     * Get all of the hotels for the Booker
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }
    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}
