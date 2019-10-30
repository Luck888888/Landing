<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Portfolio::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'images' => $faker->image(),
        'filter' => $faker->words(1, true),
    ];
});
