<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Models\Agency::class, function (Faker $faker) {
    return [
        'name' => $faker->company,
        'email' => $faker->companyEmail,
        'web' => $faker->url,
        'about' => $faker->paragraph(20),
        'country' => $faker->country,
        'city' => $faker->city,
        'address' => $faker->address,
        'ceo' => $faker->name,
    ];
});
