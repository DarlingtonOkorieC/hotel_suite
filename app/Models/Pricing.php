<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pricing extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'amount', 'rooms', 'gallery_up', 'support'
    ];
    public function hotels(){
        return $this->hasMany(Hotel::class);
    }
}
