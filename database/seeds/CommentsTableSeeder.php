<?php

use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	App\Comment::truncate();

    	$list = collect()->merge(App\Question::all())->merge(App\Answer::all());

        $users = App\User::all();

    	$list->each(function($item) use ($users) {
			for ($i = 0, $count = rand(0, 5); $i < $count; $i++) {                 
				$item->comments()->save($comment = factory('App\Comment')->create());
                $comment->user()->associate($users->random())->save();
			}
    	});
    }
}
