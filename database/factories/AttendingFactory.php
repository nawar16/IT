<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Attending::class, function (Faker $faker) {
    return [
        'StudentID' => App\User::inRandomOrder()->first()->id,
        'CourseName' => App\Course::inRandomOrder()->first()->Name,
        'isLaboratory' => $faker->boolean(),
        'CourseDate' => $faker->date(),
    ];
});
