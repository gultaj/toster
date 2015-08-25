<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
	public function question()
	{
		return $this->belongsTo('App\Models\Question');
	}

	public function comments()
	{
		return $this->morphMany('App\Models\Comment', 'commentable');
	}

	public function user()
	{
		return $this->belongsTo('App\Models\User');
	}

	public function likes()
	{
		return $this->belongsToMany('App\Models\User', 'answer_likes')->withTimestamps();
	}

	public function commentsCount()
	{
		return $this->comments()->selectRaw('commentable_id, count(*) as count')->groupBy('commentable_id');
	}

	public function getCommentsCountAttribute()
	{
		if (! $this->relationLoaded('commentsCount')) $this->load('commentsCount');

		$related = $this->getRelation('commentsCount')->first();
		
		return $related ? (int) $related->count : 0;
	}

	public function getCommentsCountHumansAttribute()
	{
		$count = (int) ($this->relationLoaded('commentsCount') ? $this->commentsCount : $this->comments->count());

		return $count ? $count .' '. count_comments($count) : null;
	}

}
