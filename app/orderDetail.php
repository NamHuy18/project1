<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class orderDetail extends Model
{
    protected $guared = ['id'];

    protected $table = "order_detail";
    
    protected $date = [
    	'created_at',
    	'updated_at',
    ];

    public function food()
    {
    	return $this->belongsTo('App\Food', 'food_id');
    }

    public function order()
    {
    	return $this->belongsTo('App\Order', 'order_id');
    }
}
