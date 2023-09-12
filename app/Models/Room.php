<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'number', 'pricing', 'address_id',  'hotel_id', 'photo'
    ];

    public function hotel(){
        return $this->belongsTo(Hotel::class);
    }
    public function address(){
        return $this->belongsTo(Address::class);
    }

    public function rooms(){
        return $this->hasMany(Room::class);
    }
}
