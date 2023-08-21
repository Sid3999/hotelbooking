<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HotelGallery extends Model
{
    // protected $table = "hotels_gallery";
    protected $fillable = ['user_id', 'hotel_id', 'img_url'];

}
