<?php

use Illuminate\Database\Seeder;

class QuestionTagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('question_tags')->truncate();

        $tags = App\Tag::all();

        App\Question::all()->each(function($question) use ($tags)
        {
            $random_tags = $tags->random(rand(1, 5))->all();
            foreach ($random_tags as $tag) {
                $question->tags()->attach($tag->id);
            }
        });
    }
}
