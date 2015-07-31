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
        App\Subscribe::truncate();

    	$list = collect()->merge(App\Question::All())->merge(App\Tag::all());

        $users = App\User::all();

    	$list->each(function($item) use ($users) {
			for ($i = 0, $count = rand(0, 10); $i < $count; $i++) {                 
				$item->subscribers()->save($subscriber = factory('App\Subscribe')->create());
                $subscriber->user()->associate($users->random())->save();
			}
    	});
    }
}
