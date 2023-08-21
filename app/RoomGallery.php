<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RoomGallery extends Model
{
    use SoftDeletes;

    protected $fillable = ['image_url', 'category_id', 'user_id', 'hotel_id'];
    public function hotelCategory()
    {
        return $this->belongsTo('App\RoomCategory', 'category_id', 'id');
    }

}
