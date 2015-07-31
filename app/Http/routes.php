<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//Route::get('/', function() {
//
//});



\Carbon\Carbon::setLocale(\App::getLocale());


Route::get('/', ['as' => 'home', 'uses' => 'QuestionsController@index']);

Route::get('/q/{id}', ['as' => 'q', 'uses' => 'QuestionsController@show'])->where(['id' => '[0-9]+']);
Route::group(['namespace' => 'Auth'], function()
{
	get('auth/login', ['as' => 'auth.login', 'uses' => 'AuthController@getLogin']);
});

get('/tag/{slug}/questions', ['as' => 'tag', 'uses' => 'TagsController@questions']);
get('/tag/{slug}/questions/interest', ['as' => 'tag.interest', 'uses' => 'TagsController@interest']);
get('/tag/{slug}/questions/without_answer', ['as' => 'tag.wo_answer', 'uses' => 'TagsController@withoutAnswer']);
get('/tag/{slug}/info', ['as' => 'tag.info', 'uses' => 'TagsController@info']);


get('/user/{nickname}', ['as' => 'user', 'uses' => 'UsersController@show']);

Route::controller('/user/{nickname}', 'UsersController', [
	'getQuestions' 	=> 'user.questions',
	'getAnswers'  	=> 'user.answers',
	'getTags'	  	=> 'user.tags',
	'getSubscribes' => 'user.subscribes'
]);

get('answer', ['as' => 'answer', 'uses' => 'AnswersController@index']);

get('test', function() {

	$list = App\Answer::item()->limit(5)->get();

	dd($list);

});