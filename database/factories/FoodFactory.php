<?php

use Faker\Generator as Faker;

$factory->define(App\Food::class, function (Faker $faker) {
    return [
        //
        'name' => $faker->text(15),
        'slug' => $faker->slug,
        'description' => $faker->text(50),
        'content' => $faker->text(191),
        'price' => $faker->randomDigit,
        'rating' => str_random(10),
        'top' =>'1',
        'new'=>'1',
        'created_at' => new DateTime,
        'updated_at' => new DateTime,
        
    ];
});
