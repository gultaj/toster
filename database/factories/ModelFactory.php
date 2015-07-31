<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function ($faker) {

    $faker->addProvider(new Faker\Provider\ru_RU\Text($faker));
    $faker->addProvider(new Faker\Provider\ru_RU\Person($faker));

    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'nickname' => str_slug($faker->unique()->userName),
        'email' => $faker->unique()->email,
        'password' => 'secret',
        'about' => $faker->realText(rand(10, 50), 5),
        'about_long' => $faker->realText(rand(50, 200), 5),
        'avatar' => 'img/user' . rand(1, 4) . '.png',
        'is_admin' => 0,
    ];
});

$factory->define(App\Question::class, function($faker) {

    $faker->addProvider(new Faker\Provider\ru_RU\Text($faker));
    return [
       'title' => $faker->realText(rand(50, 100), 5),
       'body' => $faker->realText(rand(100, 500), 5),
       'view_count' => rand(0, 200),
    ];
});

$factory->define(App\Answer::class, function($faker) {

    $faker->addProvider(new Faker\Provider\ru_RU\Text($faker));
    return [
        'body' => $faker->realText(rand(100, 500), 5),
        'is_solution' => (!rand(0, 10) ? 1 : 0),
    ];
});

$factory->define(App\Tag::class, function($faker) {

    $faker->addProvider(new Faker\Provider\ru_RU\Text($faker));
    return [
        'title' => $title = $faker->word . $faker->unique()->randomLetter,
        'slug' => str_slug($title),
        'description' => $faker->realText(rand(150, 255), 5)
    ];
});

$factory->define(App\Comment::class, function($faker) {

    $faker->addProvider(new Faker\Provider\ru_RU\Text($faker));
    return [
        'body' => $faker->realText(rand(50, 200), 5)
    ];
});

$factory->define(App\Subscribe::class, function($faker) {

    return [];
});
