<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HotelService extends Model
{
    protected $fillable = ['user_id', 'hotel_id', 'service'];

    public function hotel()
    {
        return $this->belongsTo('App\Hotel', 'user_id');
    }
}