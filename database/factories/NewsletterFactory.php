<?php

use Faker\Generator as Faker;
use App\Models\Newsletter;

$factory->define(Newsletter::class, function (Faker $faker) {
    return [
        'email' => $faker->unique()->safeEmail,
    ];
});
