<?php

namespace App;

use App\Room;
use App\Hotel;
use App\RoomCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RoomBooking extends Model
{
    protected $fillable = [
        'hotel_id',
        'booking_number',
        'room_id',
        'user_id',
        'no_of_adults',
        'no_of_childrens',
        'visitors_name_list',
        'special_request',
        'contact_no',
        'approx_arrival_time',
        'check_in', 
        'check_out',
        'balance_amount',
        'category_id'
    ];
    use SoftDeletes;
    public function rooms()
    {
        return $this->hasOne(Room::class, 'room_id');
    }
    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }
    public function roomCategory()
    {
        return $this->hasOne(RoomCategory::class, 'id');
    }
    public function user()
    {
        return $this->hasOne('App/User', 'user_id');
    }
}
