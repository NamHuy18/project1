<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    protected $guared = ['id'];

    protected $fillable = [
        'discount', 
        'start_date', 
        'end_date',
    ];
    
    protected $date = [
    	'created_at',
    	'updated_at',
    ];

    public function foods()
    {
    	return $this->hasMany('App\Food', 'promotion_id');
    }
}
