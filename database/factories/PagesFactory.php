<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Page::class, function (Faker $faker) {
    return [

        'name' => $faker->name,
        'alias' => $faker->name,
        'text' => $faker->text,
        'images' => $faker->image(),
    ];
});


//$factory->define(\App\Kards::class, function (Faker $faker) {
//    return [
//        'fullname' => $faker->name,
//        'birth_date'=> today()->subYears(rand(10, 20))->subMonths(rand(1, 11))->subDays(rand(1, 25))->format('Y-m-d'),
//        'year' => today()->subYears(rand(15, 30))->format('Y'),
//        'email' => $faker->unique()->safeEmail,
//        'job' => $faker->words(2, true),
//        'about' => $faker->address,
//        'profile' => $faker->text,
//        'skills' => $faker->realText(),
//        'aducationame' =>$faker->phoneNumber,
//        'metaname' => $faker->colorName,
//        'meta' => $faker->image(),
//        'portfolio' => $faker->imageUrl($width=320, $height=240, 'cats', true),
//    ];