<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{  
    protected $guared = ['id'];
    
    protected $date = [
    	'created_at',
    	'updated_at',
    ];
}
