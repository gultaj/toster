<?php

use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	App\Models\Tag::truncate();
    	
        factory('App\Models\Tag', 20)->create();
    }
}
