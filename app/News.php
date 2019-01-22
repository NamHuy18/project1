<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    //
    protected $table = "news";

    public function newsComments(){

    	return $this->morphMany('App\Comment','object');
    }

}
