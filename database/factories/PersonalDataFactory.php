<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\PersonalData;
use Faker\Generator as Faker;

$factory->define(PersonalData::class, function (Faker $faker) {
    return [
        'user_id' => $faker->unique()->numberBetween(1,50),
        'address' => $faker->address,
        'phone' => $faker->phoneNumber,
        'relatives_phone' => $faker->phoneNumber,
    ];
});
