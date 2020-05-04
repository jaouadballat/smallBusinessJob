<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\models\Category::class, function (Faker $faker) {
    $categories = [
        'Design & Creative',
        'Design & Development',
        'Sales & Marketing',
        'Mobile Application',
    ];

    return [
        'name' => \Illuminate\Support\Arr::random($categories)
    ];
});
