<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Car;
use Faker\Generator as Faker;
use Illuminate\Support\Str;


$factory->define(Car::class, function (Faker $faker) {
    return [
        'name_driver' => $faker->name,
        'number' => $faker->randomNumber,
        'autopark' => Str::random(10),
        'id_user' =>  $faker->randomNumber,
        'published_at' => now(),

    ];
});
