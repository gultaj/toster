<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
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

	public function subscribers()
	{
		return $this->morphMany('App\Models\Subscribe', 'subscribable');
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

	public function subscribersCount()
	{
		return $this->subscribers()->selectRaw('subscribable_id, count(*) as count')->groupBy('subscribable_id');
	}

	// ATTRIBUTES

	public function getSubscribersCountAttribute()
	{
		if (! $this->relationLoaded('subscribersCount')) $this->load('subscribersCount');

		$related = $this->getRelation('subscribersCount')->first();
		
		return $related ? (int) $related->count : 0;
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

	public function getSubscribersCountHumansAttribute()
	{
		$count = $this->subscribersCount;

		return $count .' '. \Lang::choice('count.subscribers', ru_count($count));
	}

	public function getVeiwCountHumansAttribute()
	{
		return $this->view_count . ' ' . \Lang::choice('count.views', ru_count($this->view_count));
	}

	public function scopeFull($query)
	{
		return $query->with('tags', 'user')
			->with('comments', 'comments.user')
			->with('answers', 'answers.user', 'answers.comments', 'answers.comments.user', 'answers.likes')
			->with('subscribersCount');
	}
}
