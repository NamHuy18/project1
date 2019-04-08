<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{  
    protected $guared = ['id'];

    protected $fillable = [
        'name', 
        'slug',
    ];

    protected $date = [
    	'created_at',
    	'updated_at',
    ];

    public function foods()
    {
    	return $this->belongsToMany('App\Food', 'category_food', 'category_id', 'food_id')->withPivot('category_id');
    }
}
