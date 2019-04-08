<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{  
    protected $guared = ['id'];

    protected $fillable = [
        'status', 
    ];
    
    protected $date = [
        'created_at',
        'updated_at',
    ];

    public function orderDetails()
    {
        return $this->hasMany('App\orderDetail', 'order_id');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}

