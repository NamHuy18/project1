<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class orderDetail extends Model
{
    //
    protected $table = "order_detail";

    public function orderDetailFood(){

    	return $this->belongsTo('App\Food','foods_id','id');
    }

    public function orderDetailOrder(){

    	return $this->belongsTo('App\Order','orders_id','id');
    }

}
