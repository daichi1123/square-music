<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use App\Song;
use Faker\Generator as Faker;

$factory->define(Song::class, function (Faker $faker) {
    return [
        'user_id' => function () {
            return factory(User::class);
        },
        'url' => '3AUKs91RtPaNaMRcbZlotg?si=79957eb6561f482e',
        'comment' => $faker->text(25),
    ];
});
