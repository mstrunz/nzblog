<?php

use Faker\Generator as Faker;

$factory->define(\App\Post::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(4),
        'body' => $faker->sentence(200),
        'date' => $faker->date('Y-m-d')
    ];
});
