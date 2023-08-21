<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email','is_active', 'password', 'designation', 'education', 'skills', 'image', 'cnic', 'utility_bill', 'mobile', 'phone', 'address', 'bio', 'provider', 'provider_id', 'cnic_no', 'date_of_birth',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Every user has many roles
     *
     * @return void
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    /**
     * Every user has many permissions
     *
     * @return void
     */
    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }

    public function rating()
    {
        return $this->hasOne(Rating::class, 'user_id', 'id');
    }

    public function hotel()
    {
        return $this->hasOne(Hotel::class, 'user_id', 'id');
    }

    public function paymentInfo()
    {
        return $this->hasOne(Payment::class, 'user_id', 'id');
    }
}
