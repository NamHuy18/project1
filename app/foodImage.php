<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class foodImage extends Model
{ 
    protected $guared = ['id'];
    
    protected $date = [
    	'created_at',
    	'updated_at',
    ];

    public function food()
    {
    	return $this->belongsTo('App\Food', 'food_id');
    }
}
