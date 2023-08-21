<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HotelSurrounding extends Model
{
    protected $fillable = ['user_id','hotel_id','surrounding_location','surrounding_distance'];
}
