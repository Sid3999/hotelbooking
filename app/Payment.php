<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model
{
    use SoftDeletes;
    protected $fillable = ['user_id', 'hotel_id', 'charges', 'discount', 'subscription_type', 'confirm_at'];
    protected $dates = ['confirm_at'];
    protected $table = 'payments';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }

}
