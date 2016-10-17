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

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Company::class, function (Faker\Generator $faker) {
    return [
        'company' => $faker->company,
        'phone' => $faker->phoneNumber,
        'address' => $faker->address,
    ];
});

$factory->define(App\Song::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->text(20),
        'lyrics' => $faker->text(800),
        'slug' => $faker->slug,
        'created_by' => random_int(1, 3),
    ];
});
