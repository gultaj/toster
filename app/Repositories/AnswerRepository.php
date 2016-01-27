<?php namespace App\Repositories;

use App\Repositories\Repository;
use App\Models\Answer;

/**
* 
*/
class AnswerRepository extends Repository
{
	
	function __construct(Answer $answer)
	{
		$this->model = $answer;
	}

	public function addLike($user_id)
	{
		$this->model->likes()->attach($user_id);
	}
	
}