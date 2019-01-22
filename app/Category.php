<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $table = "categories";

    public function categoryFoods(){

    	return $this->belongsToMany(Food::class);
    }

}
