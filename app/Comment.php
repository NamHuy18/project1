<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    protected $table = "comments";

    public function commentUser(){

    	return $this->belongsTo('App\User','users_id','id');
    }

    public function object(){

    	return $this->morphTo();
    }

}
