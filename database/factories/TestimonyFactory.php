<?php

use Faker\Generator as Faker;
use App\Models\Testimony;

$factory->define(Testimony::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'institute' => $faker->company,
        'sequence' => $faker->randomDigit,
        'testimony' => $faker->text($maxNbChars = 100),
    ];
});
