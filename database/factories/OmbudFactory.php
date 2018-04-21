<?php

use Faker\Generator as Faker;
use App\Models\Ombud;
use App\Models\City;

$factory->define(Ombud::class, function (Faker $faker) {

    $cities = City::all()->pluck('id')->toArray();
    $types = array('Denúncia', 'Elogio', 'Reclamação', 'Sugestão');

    return [
        'type' => $faker->randomElement($types),
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'phone' => $faker->phoneNumber,
        'city_id' => $faker->randomElement($cities),
        'message' => $faker->text($maxNbChars = 450),
    ];
});
