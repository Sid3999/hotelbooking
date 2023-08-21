<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentLog extends Model
{
    protected $table = 'payment_logs';
    protected $dates = ['payment_date'];
    protected $fillable = [
        'user_id',
        'hotel_id',
        'payment_id',
        'payment_date',
        'payment_status',
        'payment'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function hotel()
    {
        return $this->belongsTo('App\Hotel');
    }
}
