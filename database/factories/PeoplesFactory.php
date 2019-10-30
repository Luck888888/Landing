<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\People::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'position' => $faker->name,
        'text' => $faker->text,
        'images' => $faker->image(),
    ];
});
