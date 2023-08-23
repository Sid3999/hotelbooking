<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Hotel extends Model
{
    use SoftDeletes;

    protected $fillable = ['uuid', 'title', 'type', 'rent_range', 'description', 'city', 'provience', 'country', 'address', 'area', 'thumbnail', 'slug','user_id','city_id'];

    public function rooms()
    {
        return $this->hasMany('App\Room', 'hotel_id' , 'id');
    }

    public function gallery()
    {
        return $this->hasMany('App\HotelGallery', 'hotel_id');
    }

    public function service()
    {
        return $this->hasMany('App\HotelService', 'hotel_id');
    }

    public function surrounding()
    {
        return $this->hasMany('App\HotelSurrounding', 'hotel_id');
    }

    public function room_hotel()
    {
        return $this->belongsTo('App\RoomBooking', 'id');
    }

    public function ratings()
    {
        return $this->hasMany(Rating::class, 'hotel_id', 'id')->with('user');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'user_id', 'id');
    }

    public function atCity()
    {
        return $this->hasOne(City::class, 'id', 'city_id');
    }
}
