<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoleUser extends Model
{
    protected $table = 'role_user';

    public function users()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
