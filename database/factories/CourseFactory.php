<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Course::class, function (Faker $faker) {
    return [
        'Name' => $faker->unique()->word(),
        /*'DoctorID' => App\Doctor::inRandomOrder()->first()->id,
        'TeacherID' => $faker->numberBetween($min=1,$max=100),*/
        'CourseTeacher' => $faker->text(20),
        'CourseYear' => $faker->year(),
        'CourseSeason' => $faker->randomNumber(),
        'HaveLabCourse' => $faker->boolean(),
        'CourseNameAR' => $faker->word(),
    ];
});
