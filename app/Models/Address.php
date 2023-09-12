<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        'address', 'hotel_id'
    ];

    public function hotel(){
        return $this->belongsTo(Hotel::class);
    }

    public function rooms(){
       return $this->hasMany(Room::class);
    }
}
