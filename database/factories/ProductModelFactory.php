<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\ProductModel;
use Faker\Generator as Faker;

$factory->define(ProductModel::class, function (Faker $faker) {
    return [
        'product_id' => $faker->numberBetween(1,30),
        'description' => $faker->unique()->text,
        'price' => $faker->randomFloat(2, 1, 500)
    ];
});
