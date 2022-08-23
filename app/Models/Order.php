<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    public function getRestInfo()
    {
        return $this->belongsTo(Restaurant::class, 'place_id', 'id');
    }
    public function getDishInfo()
    {
        return $this->belongsTo(Dish::class, 'dish_id', 'id');
    }
    public function getUserInfo()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
