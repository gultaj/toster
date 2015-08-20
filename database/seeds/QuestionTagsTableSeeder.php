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

        $tags = App\Tag::get();

        App\Question::get()->each(function($question) use ($tags)
        {
            $random_tags = $tags->random($count = rand(1, 5));
            $random_tags = ($count==1) ? [$random_tags] : $random_tags->all();
            foreach ($random_tags as $tag) {
                $question->tags()->attach($tag->id);
            }
        });
    }
}
