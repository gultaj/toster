<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subscribe extends Model
{
    
    public function subscribable()
    {
    	return $this->morphTo();
    }

    public function user()
    {
    	return $this->belongsTo('App\User');
    }
}
