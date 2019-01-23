<?php

use Faker\Generator as Faker;

$factory->define(App\Store::class, function (Faker $faker) {
    return [
        //
        'name' => $faker->text(15),
        'description' => $faker->text(50),
        'address' => $faker->address,
        'avatar' => str_random(10),
        'created_at' => new DateTime,
        'updated_at' => new DateTime,
    ];
});
