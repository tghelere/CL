<?php

use Faker\Generator as Faker;
use App\Models\Candidate;
use App\Models\City;
use App\Models\Service;

$factory->define(Candidate::class, function (Faker $faker) {

    $services = Service::all()->pluck('title')->toArray();
    $cities = City::all()->pluck('id')->toArray();

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'phone' => $faker->phoneNumber,
        'city_id' => $faker->randomElement($cities),
        'interest' => $faker->randomElement($services),
        'presentation' => $faker->text($maxNbChars = 400),
        'file_name' => $faker->file($sourceDir = './test', $targetDir = './public/teste', false),
    ];
});
