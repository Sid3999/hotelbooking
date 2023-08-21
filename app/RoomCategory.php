<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RoomCategory extends Model
{
    use SoftDeletes;

    protected $guarded = ['id'];

    protected $casts = [
        'facilities' => 'array',
    ];

    public function hotel()
    {
        return $this->belongsTo('App\Hotel', 'hotel_id');
    }

    public function rooms()
    {
        return $this->hasMany('App\Room', 'category_id');
    }

    public function gallery()
    {
        return $this->hasMany('App\RoomGallery', 'category_id');
    }

    public function service()
    {
        return $this->hasMany('App\RoomService', 'category_id');
    }

    public function bookingRoomCategory()
    {
        return $this->belongsTo('App\RoomBooking', 'category_id');
    }
}
