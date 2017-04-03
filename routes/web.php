<?php

\Carbon\Carbon::setLocale(\App::getLocale());

Auth::routes();

Route::get('/', 'QuestionsController@index')->name('home');

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'setTheme:admin'], function(){
	Route::get('/', 'DashboardController@index')->name('admin');
	Route::resource('q', 'QuestionsController');
});

Route::get('/q/{id}', 'QuestionsController@show')->where(['id' => '[0-9]+'])->name('q');
Route::get('/q/{id}/subscribe', 'SubscribesController@questionSubscribe')->where(['id' => '[0-9]+'])->name('q.subscribe');

Route::post('/comment', 'CommentsController@comment')->name('comment');

//Route::group(['namespace' => 'Auth'], function()
//{
//    Route::get('auth/login', ['as' => 'auth.login', 'uses' => 'AuthController@getLogin']);
//    Route::post('auth/login', ['as' => 'auth.login', 'uses' => 'AuthController@postLogin']);
//    Route::get('auth/logout', ['as' => 'auth.logout', 'uses' => 'AuthController@getLogout']);
//
//    Route::get('auth/registration', ['as' => 'auth.register', 'uses' => 'AuthController@getRegistration']);
//    Route::post('auth/registration', ['as' => 'auth.register', 'uses' => 'AuthController@postRegistration']);
//});
Route::group(['prefix' => '/tag/{slug}'], function() {
    Route::get('/questions', 'TagsController@questions')->name('tag');
    Route::get('/questions/interest', 'TagsController@interest')->name('tag.interest');
    Route::get('/questions/without_answer', 'TagsController@withoutAnswer')->name('tag.wo_answer');
    Route::get('/info', 'TagsController@info')->name('tag.info');
    Route::get('/subscribe', 'SubscribesController@tagSubscribe')->name('tag.subscribe');
});



Route::get('/user/{user}', 'UsersController@info')->name('user');

Route::group(['prefix' => '/user/{user}'], function() {
    Route::get('/questions', 'UsersController@questions')->name('user.questions');
	Route::get('/answers', 'UsersController@answers')->name('user.answers');
	Route::get('/tags', 'UsersController@tags')->name('user.tags');
	Route::get('/subscribes', 'UsersController@subscribes')->name('user.subscribes');
});

Route::get('answer', 'AnswersController@index')->name('answer');
Route::get('answer/like', 'AnswersController@like')->name('like');

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