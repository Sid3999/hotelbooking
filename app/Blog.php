<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $table = 'blogs';
    protected $fillable = [
        'title', 'slug', 'description', 'image', 'status', 'user_id'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
