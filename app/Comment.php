<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;

Relation::morphMap([
    'food' => App\Food::class,
    'news' => App\News::class,
]);

class Comment extends Model
{  
    protected $guared = ['id'];

    protected $fillable = [
        'content', 
        'user_id',
    ];
    
    protected $date = [
    	'created_at',
    	'updated_at',
    ];

    public function user()
    {
    	return $this->belongsTo('App\User', 'user_id');
    }

    public function commentable()
    {
    	return $this->morphTo();
    }
}

