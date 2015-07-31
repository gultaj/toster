<?php

use Illuminate\Database\Seeder;

class QuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        App\Question::truncate();

        $users = App\User::all();

        factory('App\Question', 200)->create()->each(function($question) use ($users) {

            $question->user()->associate($users->random())->save();

        });

    }
}
