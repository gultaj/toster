<?php

use Illuminate\Database\Seeder;

class AnswersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Answer::truncate();

        $users = App\User::all();

        App\Question::all()->each(function($question) use ($users) {

        	for ($i = 0, $count = rand(0, 5); $i < $count; $i++) {         		
                $question->answers()->save($answer = factory('App\Answer')->create());
                $question->update(['is_resolved' => $answer->is_solution]);
                $answer->user()->associate($users->random())->save();
        	}

        });
    }
}
