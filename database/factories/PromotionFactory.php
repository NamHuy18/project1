<?php

use Faker\Generator as Faker;

$factory->define(App\Promotion::class, function (Faker $faker) {
    return [
        'discount' => $faker->randomDigit,
        'start_date' => new DateTime,
        'end_date' => new DateTime,
        'created_at' => new DateTime,
        'updated_at' => new DateTime,
    ];
});
