<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
	protected $fillable = ['title', 'slug', 'description'];

	public function questions()
	{
		return $this->belongsToMany('App\Question', 'question_tags');        
	}

	public function subscribers()
    {
        return $this->morphMany('App\Subscribe', 'subscribable');
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
        return $this->hasManyThrough('App\Answer', 'App\Question');
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
            ->selectRaw('subscribable_id, count(*) as count')
            ->groupBy('subscribable_id');
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
