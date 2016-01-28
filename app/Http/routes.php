<?php

\Carbon\Carbon::setLocale(\App::getLocale());


Route::get('/', ['as' => 'home', 'uses' => 'QuestionsController@index']);

Route::group(['prefix' => 'admin'], function(){
	get('/', function() {
		return view('default');
	});
});

get('/q/{id}', ['as' => 'q', 'uses' => 'QuestionsController@show'])->where(['id' => '[0-9]+']);
get('/q/{id}/subscribe', ['as' => 'q.subscribe', 'uses' => 'SubscribesController@questionSubscribe'])->where(['id' => '[0-9]+']);

post('/comment', ['as' => 'comment', 'uses' => 'CommentsController@comment']);

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
get('/tag/{slug}/subscribe', ['as' => 'tag.subscribe', 'uses' => 'SubscribesController@tagSubscribe']);


get('/user/{nickname}', ['as' => 'user', 'uses' => 'UsersController@getInfo']);

Route::controller('/user/{nickname}', 'UsersController', [
	'getQuestions' 	=> 'user.questions',
	'getAnswers'  	=> 'user.answers',
	'getTags'	  	=> 'user.tags',
	'getSubscribes' => 'user.subscribes'
]);

get('answer', ['as' => 'answer', 'uses' => 'AnswersController@index']);
get('answer/like', ['as' => 'like', 'uses' => 'AnswersController@like']);

/*get('test', function() {
	// $tag = App\Models\Tag::find(1);
	// dd($tag->answers1()->get());
	\DB::enableQueryLog();

	$tags = App\Models\Tag::with(['questions' => function($query) {
		$query->select('questions.id')->with(['answers' => function($with) {
			$with->select('answers.id');
		}]);
	}])->get();
	$tags->each(function($item, $key) {
		echo $item->questions->pluck('answers')->count()."\n";
	});
	// dd($a)
	dd(\DB::getQueryLog());

	dd(\DB::table('answers')
            ->join('questions', 'questions.id', '=', 'answers.question_id')
            ->join('question_tags', 'questions.id', '=', 'question_tags.question_id')
            ->select('answers.*')
            ->where('question_tags.tag_id', 1)
            ->get());

});*/