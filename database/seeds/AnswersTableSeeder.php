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
        App\Models\Answer::truncate();

        $users = App\Models\User::all();

        App\Models\Question::all()->each(function($question) use ($users) {

        	for ($i = 0, $count = rand(0, 5); $i < $count; $i++) {         		
                $question->answers()->save($answer = factory('App\Models\Answer')->create());
                $question->update(['is_resolved' => $answer->is_solution]);
                $answer->user()->associate($users->random())->save();
        	}

        });
    }
}
