<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Toster\Traits\SubscribersModel;

class Question extends Model
{
	use SubscribersModel;

	public function answers()
	{
		return $this->hasMany('App\Models\Answer');
	}

	public function tags()
	{
		return $this->belongsToMany('App\Models\Tag', 'question_tags')->withTimestamps();
	}

	public function comments()
	{
		return $this->morphMany('App\Models\Comment', 'commentable');
	}

	public function user()
	{
		return $this->belongsTo('App\Models\User');
	}

	// COUNTS

	public function answersCount()
	{
		return $this->hasOne('App\Models\Answer')->selectRaw('question_id, count(*) as aggregate')->groupBy('question_id');
	}

	public function getAnswersCountAttribute()
	{
		if (! $this->relationLoaded('answersCount')) $this->load('answersCount');
		$related = $this->getRelation('answersCount');

		return $related ? (int) $related->aggregate : 0;
	}

	public function getCommentsCountAttribute()
	{
		return ($count = $this->comments->count()) ? $count .' '. count_comments($count) : null;
	}

	public function getVeiwCountHumansAttribute()
	{
		return $this->view_count . ' ' . \Lang::choice('count.views', ru_count($this->view_count));
	}
}
