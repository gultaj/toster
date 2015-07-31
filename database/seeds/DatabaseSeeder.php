<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ini_set('memory_limit','1024M');
        Model::unguard();

        $this->call(TagsTableSeeder::class);
        $this->call(UsersTableSeeder::class);

        $this->call(QuestionsTableSeeder::class);
        $this->call(AnswersTableSeeder::class);
        
        $this->call(AnswerLikesTableSeeder::class);

        $this->call(QuestionTagsTableSeeder::class);

        $this->call(CommentsTableSeeder::class);
        $this->call(SubscribesTableSeeder::class);
        
        Model::reguard();
    }
}
