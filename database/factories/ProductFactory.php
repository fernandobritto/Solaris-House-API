<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'categ_id' => rand(1, 10),
        'description' => $faker->sentence($nbWords = 7, $variableNbWords = true),
        'price' => $faker->numberBetween($min = 100, $max = 1000),
        'status' => $faker->text($maxNbChars = 5),
        'validate' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'slug' => $faker->word,
    ];
});
