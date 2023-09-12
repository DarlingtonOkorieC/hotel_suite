<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'address', 'descr','price_tag', 'staff', 'room_no', 'photo', 'banner', 'pricing_id', 'city', 'restaurant', 'manager_id', 'user_id', 'booker_id' 
    ];
    /**
     * Get the manager that owns the Hotel
     *
     * @return \Illuminate\Hotelbase\Eloquent\Relations\BelongsTo
     */
    public function manager()
    {
        return $this->belongsTo(Manager::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function pricing()
    {
        return $this->belongsTo(Pricing::class);
    }

    /**
     * The bookers that belong to the Hotel
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function bookers()
    {
        return $this->hasMany(Booker::class);
    }
    /**
     * Get all of the galleries for the Hotel
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function galleries()
    {
        return $this->hasMany(Gallery::class);
    }
    public function addresses()
    {
        return $this->hasMany(Address::class);
    }
    public function rooms()
    {
        return $this->hasMany(Room::class);
    }
}
