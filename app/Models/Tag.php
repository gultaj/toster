<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use App\Toster\Traits\SubscribersModel;

class Tag extends Model
{
    use SubscribersModel;

	protected $fillable = ['title', 'slug', 'description', 'icon'];

	public function questions()
	{
		return $this->belongsToMany('App\Models\Question', 'question_tags');        
	}

	public function solvedQuestions()
	{
		return $this->questions()->where('is_resolved', 1)->selectRaw('tag_id, count(*) as count')->groupBy('tag_id');
	}

    public function questionsCount()
    {
        return $this->questions()->selectRaw('tag_id, count(*) as count')->groupBy('tag_id');
    }

    public function getQuestionsCountAttribute()
    {
        if (! $this->relationLoaded('questionsCount')) $this->load('questionsCount');
        $related = $this->getRelation('questionsCount')->first();
        
        return $related ? (int) $related->count : 0;
    }

    public function getQuestionsCountHumanAttribute()
    {
        $count = (int) ($this->relationLoaded('questionsCount') ? $this->questionsCount : $this->questions->count());

        return $count .' '. \Lang::choice('count.questions', ru_count($count));
    }

    public function getAnswersCountHumanAttribute()
    {
        // $count = (int) ($this->relationLoaded('answersCount') ? $this->answersCount : $this->answers->count());
        $count = isset($this->answersCount) ? (int) $this->answersCount : 0;

        return $count .' '. \Lang::choice('count.answers', ru_count($count));
    }

	public function getSolvedQuestionsAttribute()
    {
        if (! $this->relationLoaded('solvedQuestions')) $this->load('solvedQuestions');
        $related = $this->getRelation('solvedQuestions')->first();
        
        return $related ? (int) $related->count : 0;
    }

	public function getSolvedQuestionsPercentAttribute()
	{
		return round($this->solvedQuestions / $this->questions->count() * 100);
	}
}
