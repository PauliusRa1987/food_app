<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    use HasFactory;
    public function getMeniuInfo()
    {
        return $this->belongsTo(Meniu::class, 'meniu_id', 'id');
    }
}
