<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{

    /**
     * Display the specified resource.
     *
     * @param User $user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @internal param int $id
     */
	public function info(User $user)
	{
		return view('users.show', [
		    'user' => $user,
            'menu_items' => $this->buildMenu($user)
        ]);
	}

	public function questions(User $user)
	{
		$questions = $user->questions()->with('tags', 'answersCount', 'subscribers')->paginate(15);

		return view('users.questions', [
		    'questions' => $questions,
            'user' => $user,
            'menu_items' => $this->buildMenu($user)
        ]);

	}

	public function answers(User $user)
	{
		$answers = $user->answers()->with('question', 'commentsCount', 'likes')->paginate(15);

		return view('users.answers', [
		    'user' => $user,
            'answers' => $answers,
            'menu_items' => $this->buildMenu($user)
        ]);

		
	}

	public function tags(User $user)
	{
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

	public function subscribes($nickname)
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
