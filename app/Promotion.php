<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    //
    protected $table = "promotion";

    public function promotionFoods(){

    	return $this->hasMany('App\Food','promotion_id','id');
    }

}
