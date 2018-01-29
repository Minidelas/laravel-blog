<?php

use Faker\Generator as Faker;

$factory->define(App\Article::class, function (Faker $faker) {
    return [
        'title' => substr($faker->sentence(2), 0, -1),
        'content' => $faker->paragraph,
        'user_id' => rand(1, 5),
    ];
});
