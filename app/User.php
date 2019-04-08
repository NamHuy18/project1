<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 
        'email', 
        'password',
        'phone_number',
        'address',
        'level',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 
        'remember_token',
    ];

    protected $guared = ['id'];
    
    protected $date = [
        'email_verified_at',
        'created_at',
        'updated_at',
    ];

    public function comments()
    {
        return $this->hasMany('App\Comment', 'user_id');
    }

    public function orders()
    {
        return $this->hasMany('App\Order', 'user_id');
    }

    public function news()
    {
        return $this->hasMany('App\News', 'user_id');
    }
}

