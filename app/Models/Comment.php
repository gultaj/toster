<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

	public $fillable = ['body'];
	
    public function commentable()
    {
    	return $this->morphTo();
    }

    public function user()
    {
    	return $this->belongsTo('App\Models\User');
    }

}
