<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Models\Job::class, function (Faker $faker) {

    $contracts = ['Full time', 'Remote', 'freelance', 'part time'];

    return [
        'title' => $faker->jobTitle,
        'location' => $faker->city,
        'salary' => $faker->randomFloat,
        'contract_type' => \Illuminate\Support\Arr::random($contracts),
        'job_description' => $faker->sentence(50),
        'skills' => $faker->sentence(50),
        'education' => $faker->sentence(50),
        'experiences' => $faker->sentence(50),
        'experiences_number' => $faker->numberBetween(1, 6),
    ];
});
