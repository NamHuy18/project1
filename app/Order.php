<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    protected $table = "orders";

    public function orderDetails(){

    	return $this->hasMany('App\orderDetail','orders_id','id');
    }

    public function orderUser(){

    	return $this->belongsTo('App\User','users_id','id');
    }

    public function orderStore(){

    	return $this->belongsTo('App\Store','stores_id','id');
    }

}
