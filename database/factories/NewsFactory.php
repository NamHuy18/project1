<?php

use Faker\Generator as Faker;

$factory->define(App\News::class, function (Faker $faker) {
    return [
        'title' => $faker->text(15),
        'description' => $faker->text(50),
        'content' => $faker->text(100),
        'image' => str_random(10),
        'created_at' => new DateTime,
        'updated_at' => new DateTime,
    ];
});

