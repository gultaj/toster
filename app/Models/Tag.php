<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
	protected $fillable = ['title', 'slug', 'description'];

	public function questions()
	{
		return $this->belongsToMany('App\Models\Question', 'question_tags');        
	}

	public function subscribers()
    {
        return $this->morphToMany('App\Models\User', 'subscribe');
    }

    public function hasSubscriber(User $user)
    {
        if (! $this->relationLoaded('subscribers'))
            $this->load('subscribers');

        $subscribers = $this->getRelation('subscribers');

        return $subscribers->contains($user);
    }

	public function solvedQuestions()
	{
		return $this->questions()
			->where('is_resolved', 1)
			->selectRaw('tag_id, count(*) as count')
			->groupBy('tag_id');
	}

    public function answers()
    {
        return $this->hasManyThrough('App\Models\Answer', 'App\Models\Question');
    }

	public function getSolvedQuestionsAttribute()
    {
        if (! $this->relationLoaded('solvedQuestions'))
            $this->load('solvedQuestions');

        $related = $this->getRelation('solvedQuestions')->first();
        
        return $related ? (int) $related->count : 0;
    }

	public function getSolvedQuestionsPercentAttribute()
	{
		// $count = $this->solvedQuestions;
		return round($this->solvedQuestions / $this->questions->count() * 100);
	}

	public function subscribersCount()
    {
        return $this->subscribers()
            ->selectRaw('subscribe_id, count(*) as count')
            ->groupBy('subscribe_id');
    }

    public function getSubscribersCountAttribute()
    {
        if (! $this->relationLoaded('subscribersCount'))
            $this->load('subscribersCount');

        $related = $this->getRelation('subscribersCount')->first();
        
        return $related ? (int) $related->count : 0;
    }

    public function getSubscribersCountHumansAttribute()
    {
        $count = (int) ($this->relationLoaded('subscribersCount') ? $this->subscribersCount : $this->subscribers->count());

        return $count .' '. \Lang::choice('count.subscribers', ru_count($count));
    }

}
