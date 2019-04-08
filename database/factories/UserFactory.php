<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'avatar' => $faker->text(10),
        'level' => '1',
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'phone_number' => $faker->phoneNumber,
        'address' => $faker->address,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
     	'created_at' => new DateTime,
        'updated_at' => new DateTime,
    ];
});
