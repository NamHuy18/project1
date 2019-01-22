<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    //
    protected $table = "stores";

    public function storeFoods(){

    	return $this->belongsToMany(Food::class);
    }

    public function storeOrders(){

    	return $this->hasMany('App\Order','stores_id','id');
    }

}
