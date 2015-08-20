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

        App\Models\Question::truncate();

        $users = App\Models\User::all();

        factory('App\Models\Question', 200)->create()->each(function($question) use ($users) {

            $question->user()->associate($users->random())->save();

        });

    }
}
