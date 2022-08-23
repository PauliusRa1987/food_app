<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meniu extends Model
{
    use HasFactory;
    public function getInfo()
    {
        return $this->belongsTo(Restaurant::class, 'place_id', 'id');
    }

    public function dishes()
    {
        return $this->hasMany(Dish::class, 'meniu_id', 'id');
    }
}
