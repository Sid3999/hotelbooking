<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RoomService extends Model
{
    use SoftDeletes;
    protected $fillable = ['title', 'user_id', 'category_id', 'hotel_id'];

    public function hotelCategory()
    {
        return $this->belongsTo('App\RoomCategory', 'category_id', 'id');
    }
  
}