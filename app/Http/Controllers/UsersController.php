<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
	public function show($nickname)
	{
		$user = \App\User::where('nickname', $nickname)->first();

		return view('users.show', compact('user'))->with('menu_items', $this->buildMenu($user));
	}

	public function getQuestions($nickname)
	{
		$user = \App\User::where('nickname', $nickname)->first();
		$questions = $user->questions()->with('tags', 'answersCount', 'subscribers')->paginate(15);

		return view('users.questions', compact('questions', 'user'))->with('menu_items', $this->buildMenu($user));

	}

	public function getAnswers($nickname)
	{
		$user = \App\User::where('nickname', $nickname)->first();

		$answers = $user->answers()->with('question', 'commentsCount', 'likes')->paginate(15);

		return view('users.answers', compact('user', 'answers'))->with('menu_items', $this->buildMenu($user));

		
	}

	public function getTags($nickname)
	{
		
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
