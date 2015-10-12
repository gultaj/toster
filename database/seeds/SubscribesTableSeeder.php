<?php

use Illuminate\Database\Seeder;

class SubscribesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subscribes')->truncate();

    	$list = collect()->merge(App\Models\Question::all())->merge(App\Models\Tag::all());

        $users = App\Models\User::all();

    	$list->each(function($item) use ($users) {
			for ($i = 0, $count = rand(0, 10); $i < $count; $i++) {                 
				$item->subscribers()->attach($users->random());
			}
    	});
    }
}
