<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{   

    protected $guared = ['id'];

    protected $fillable = [
        'name', 
        'slug', 
        'description',
        'content',
        'price',
        'top',
        'new',
        'promotion_id',
    ];
    
    protected $date = [
        'created_at',
        'updated_at',
    ];

    public function categories()
    {
        return $this->belongsToMany('App\Category', 'category_food', 'food_id', 'category_id');
    }

    public function images()
    {
        return $this->hasMany('App\foodImage', 'food_id');
    }

    public function orderDetails()
    {
        return $this->hasMany('App\orderDetail', 'food_id');
    }

    public function promotion()
    {
        return $this->belongsTo('App\Promotion', 'promotion_id');
    }

    public function comments()
    {
        return $this->morphMany('App\Comment', 'commentable');
    }
}

