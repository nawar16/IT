<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\DailyProgram::class, function (Faker $faker) {
    return [
        'CourseName' => App\Course::inRandomOrder()->first()->Name,
        'ClassNumber' => $faker->randomNumber(),
        'Year' =>strtoupper($faker->lexify('??')),
        'Day' => $faker->text(20),
        'Time' => $faker->text(20),
        'Place' => $faker->text(20),
    ];
});
