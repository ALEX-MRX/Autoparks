<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;
use App\Autopark;


//numberBetween
$factory->define(Autopark::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'address' => $faker->address,
        'schedule' => "с 8:30-16:00",
        'car' => $faker->randomNumber,
        'created_at' => now(),
        'updated_at' => now(),
        'published_at' => now(),
    ];
});
