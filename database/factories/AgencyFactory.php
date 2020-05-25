<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Models\Agency::class, function (Faker $faker) use ($factory) {
    return [
        'name' => $faker->company,
        'email' => $faker->companyEmail,
        'web' => $faker->url,
        'about' => $faker->paragraph(20),
        'country' => $faker->country,
        'city' => $faker->city,
        'address' => $faker->address,
        'user_id' => factory(\App\User::class)->create(['role' => 'ceo'])->id,
        'foundedAt' => $faker->year,
    ];
});
