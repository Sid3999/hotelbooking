<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = ['uuid', 'room_no', 'reserved', 'user_id', 'hotel_id', 'category_id'];

    protected $casts = [
        'bed_detail' => 'array',
    ];

    public function roomCategory()
    {
        return $this->belongsTo('App\RoomCategory', 'category_id', 'id');
    }

    public function roomBooking()
    {
        return $this->hasMany('App\RoomBooking', 'room_id', 'id');
    }

    public function hotel()
    {
        return $this->belongsTo('App\Hotel', 'hotel_id', 'id');
    }
}
