<?php

use Faker\Generator as Faker;

$factory->define(App\Category::class, function (Faker $faker) {
    return [
        'name' => $faker->text(15),
        'slug' => $faker->slug,
        'created_at' => new DateTime,
        'updated_at' => new DateTime,
    ];
});
