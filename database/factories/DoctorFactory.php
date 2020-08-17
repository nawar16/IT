<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Doctor::class, function (Faker $faker) {
    return [
        'Name' => $faker->name,
        'Certification' => $faker->word(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
        //'api_token' => bin2hex(openssl_random_pseudo_bytes(30)),
    ];
});
