<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class foodImage extends Model
{
    //
    protected $table = "food_image";

    public function imageFood(){

    	return $this->belongsTo('App\Food','foods_id','id');
    }

}
