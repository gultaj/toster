<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function getInfo($nickname)
	{
		$user = User::where('nickname', $nickname)->first();

		return view('users.show', compact('user'))->with('menu_items', $this->buildMenu($user));
	}

	public function getQuestions($nickname)
	{
		$user = User::where('nickname', $nickname)->first();
		$questions = $user->questions()->with('tags', 'answersCount', 'subscribers')->paginate(15);

		return view('users.questions', compact('questions', 'user'))->with('menu_items', $this->buildMenu($user));

	}

	public function getAnswers($nickname)
	{
		$user = User::where('nickname', $nickname)->first();

		$answers = $user->answers()->with('question', 'commentsCount', 'likes')->paginate(15);

		return view('users.answers', compact('user', 'answers'))->with('menu_items', $this->buildMenu($user));

		
	}

	public function getTags($nickname)
	{

		

    
		$user = User::where('nickname', $nickname)->first();


		$tags = $user->subscribedTags()->with(['subscribers', 'subscribersCount',
			'questionsCount' => function($query) use ($user) {
				$query->where('user_id', $user->id);
			},
		])->get();

		// return $tags[0]->answers;
		// $timeStart = microtime(true);
		$answers = \DB::table('answers')            
			->join('questions', 'questions.id', '=', 'answers.question_id')
            ->join('question_tags', 'questions.id', '=', 'question_tags.question_id')
            ->select('answers.id', 'question_tags.tag_id as tag_id')
            ->whereIn('question_tags.tag_id', $tags->pluck('id'))
            ->where('answers.user_id', $user->id)
            ->get();


       	$answers = collect($answers)->groupBy('tag_id');
       	$tags = $tags->each(function($tag, $key) use ($answers) {
       		$tag->answersCount = isset($answers[$tag->id]) ? count($answers[$tag->id]) : 0;
       	});

/*       	$diff = microtime(true) - $timeStart;
    	$micro = $diff - intval($diff);
    	return $micro;*/
		
		return view('users.tags', [
			'user' => $user, 
			'tags' => $tags,
			'menu_items' => $this->buildMenu($user)
		]);
	}

	public function getSubscribes($nickname)
	{


	}

	public function buildMenu($user = null)
	{
		return [
			'Информация' => route('user', ['nickname' => $user->nickname]),
			'Ответы' 	 => route('user.answers', ['nickname' => $user->nickname]),
			'Вопросы' 	 => route('user.questions', ['nickname' => $user->nickname]),
			'Подписан' 	 => '#',//route('user.subscribe', ['nickname' => $user->nickname]),
			'Теги' 		 => route('user.tags', ['nickname' => $user->nickname]),
		];
	}

}
