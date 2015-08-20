<?php

use Illuminate\Database\Seeder;

class AnswerLikesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('answer_likes')->truncate();

        $users = App\Models\User::get();

        App\Models\Answer::all()->each(function($answer) use ($users) {

        	if (rand(0, 10) < 6) return;

    		$random_users = ($count = rand(1, 5)) ? $users->random($count) : [];

    		$random_users = ($count==1) ? [$random_users] : $random_users->all();

        	foreach ($random_users as $user) {
        		if ($answer->user->id == $user->id) continue;
	        	$answer->likes()->attach($user->id); 
        	}
        });

    }
}
