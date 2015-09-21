<?php namespace App\Repositories;

use App\Models\Question;
use App\Repositories\Repository;

class QuestionRepository extends Repository {

	public function __construct(Question $question)
	{
		$this->model = $question;
	}

	public function index($n = 15)
	{
		return $this->model
			->with('tags', 'answersCount', 'subscribersCount')
			->paginate($n);
	}

	public function show($id)
	{
		return $this->model->with('tags', 'user')
			->with('comments', 'comments.user')
			->with('answers', 'answers.user', 'answers.comments', 'answers.comments.user', 'answers.likes')
			->with('subscribersCount')
			->findOrFail($id);
	}

	public function incrementView()
	{
		$this->model->increment('view_count');
	}
}