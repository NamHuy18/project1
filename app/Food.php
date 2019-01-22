<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    //
    protected $table = "foods";

    public function foodCategories(){

    	return $this->belongsToMany(Category::class);
    }

    public function foodImages(){

    	return $this->hasMany('App\foodImage','foods_id','id');
    }

    public function foodOrderDetail(){

    	return $this->hasMany('App\orderDetail','foods_id','id');
    }

    public function foodPromotion(){

    	return $this->belongsTo('App\Promotion','promotion_id','id');
    }

    public function foodStores(){

    	return $this->belongsToMany(Store::class);
    }

    public function foodComments(){

        return $this->morphMany('App\Comment','object');
    }
}
