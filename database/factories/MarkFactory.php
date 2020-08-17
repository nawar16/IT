<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Mark::class, function (Faker $faker) {
    return [
        'StudentID' => App\User::inRandomOrder()->first()->id,
       'CourseName' => App\Course::inRandomOrder()->first()->Name,
       'LabHomeworkMark' => $faker->randomNumber(),
       'LabExamMark' => $faker->randomNumber(),
       'FinalExamMark' => $faker->randomNumber(),
    ];
});
