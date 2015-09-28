<?php

\Carbon\Carbon::setLocale(\App::getLocale());


Route::get('/', ['as' => 'home', 'uses' => 'QuestionsController@index']);

Route::get('/q/{id}', ['as' => 'q', 'uses' => 'QuestionsController@show'])->where(['id' => '[0-9]+']);

Route::group(['namespace' => 'Auth'], function()
{
	get('auth/login', ['as' => 'auth.login', 'uses' => 'AuthController@getLogin']);
	post('auth/login', ['as' => 'auth.login', 'uses' => 'AuthController@postLogin']);
	get('auth/logout', ['as' => 'auth.logout', 'uses' => 'AuthController@getLogout']);

	get('auth/registration', ['as' => 'auth.register', 'uses' => 'AuthController@getRegistration']);
	post('auth/registration', ['as' => 'auth.register', 'uses' => 'AuthController@postRegistration']);
});

get('/tag/{slug}/questions', ['as' => 'tag', 'uses' => 'TagsController@questions']);
get('/tag/{slug}/questions/interest', ['as' => 'tag.interest', 'uses' => 'TagsController@interest']);
get('/tag/{slug}/questions/without_answer', ['as' => 'tag.wo_answer', 'uses' => 'TagsController@withoutAnswer']);
get('/tag/{slug}/info', ['as' => 'tag.info', 'uses' => 'TagsController@info']);


get('/user/{nickname}', ['as' => 'user', 'uses' => 'UsersController@getInfo']);

Route::controller('/user/{nickname}', 'UsersController', [
	'getQuestions' 	=> 'user.questions',
	'getAnswers'  	=> 'user.answers',
	'getTags'	  	=> 'user.tags',
	'getSubscribes' => 'user.subscribes'
]);

get('answer', ['as' => 'answer', 'uses' => 'AnswersController@index']);
get('answer/like', ['as' => 'like', 'uses' => 'AnswersController@like']);

get('test', function() {

	Auth::logout();

});