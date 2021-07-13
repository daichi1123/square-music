<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Illuminate\Support\Facades\Hash;
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

$factory->define(User::class, function (Faker $faker) {
    return [
        'last_name' => $faker->lastName,
        'middle_name' => '',
        'first_name' => $faker->firstName,
        'email' => $faker->unique()->email,
        'password' => Hash::make('example100'),
        'country_id' => 1,
        'age_id' => 1,
        'sex' => '男性',
        'self_introduction' => $faker->text(50),
        'insta_id' => 'instagram'
    ];
});
