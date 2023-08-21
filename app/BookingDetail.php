<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BookingDetail extends Model
{
    protected $table = 'room_booking_details';
    protected $fillable = ['booking_id', 'room_id', 'hotel_id', 'user_id','booking_date'];
    use SoftDeletes;

    public function booking()
    {
        return $this->belongsTo('App\Booking', 'booking_id');
    }

    public function room()
    {
        return $this->belongsTo('App\Room', 'room_id');
    }

    public function hotel()
    {
        return $this->belongsTo('App\Hotel', 'hotel_id');
    }
}
