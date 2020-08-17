<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\News::class, function (Faker $faker) {
    return [
        'Title' => $faker->text(20),
        'Details' => $faker->text(20),
        'TargetStudents' => $faker->text(20),
        'TargetProffessors' => $faker->text(20),
        'PostDate' => $faker->dateTime(20),
    ];
});
