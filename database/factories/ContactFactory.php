<?php

use Faker\Generator as Faker;
use App\Models\Contact;
use App\Models\City;

$factory->define(Contact::class, function (Faker $faker) {
    
    $cities = City::all()->pluck('id')->toArray();

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'phone' => $faker->phoneNumber,
        'city_id' => $faker->randomElement($cities),
        'message' => $faker->text($maxNbChars = 450),
    ];
});
