<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $guared = ['id'];
    
    protected $fillable = [
        'name', 
        'description',
        'address',
        'avatar',
    ];

    protected $date = [
    	'created_at',
    	'updated_at',
    ];

    public function foods()
    {
    	return $this->belongsToMany('App\Food', 'food_store', 'store_id', 'food_id');
    }

    public function orders()
    {
    	return $this->hasMany('App\Order', 'store_id');
    }
}
