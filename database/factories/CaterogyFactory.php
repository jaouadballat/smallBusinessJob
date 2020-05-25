<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\models\Category::class, function (Faker $faker) {
    $categories = [
        'Design and Creative',
        'Design and Development',
        'Sales and Marketing',
        'Mobile Application',
    ];

    return [
        'name' => \Illuminate\Support\Arr::random($categories)
    ];
});
