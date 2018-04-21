<?php

use Faker\Generator as Faker;
use App\Models\Budget;
use App\Models\Solution;
use App\Models\Service;
use App\Models\City;

$factory->define(Budget::class, function (Faker $faker) {

    $solutions = Solution::all()->pluck('id')->toArray();
    $services = Service::all()->pluck('title')->toArray();
    $employees = array('1 a 10', '10 a 20', '20 a 30', 'acima de 30');
    $cities = City::all()->pluck('id')->toArray();

    return [
        'solution_id' => $faker->randomElement($solutions),
        'number_of_employees' => $faker->randomElement($employees),
        'services' => $faker->randomElement($services, $count = 2, $allowDuplicates = false),
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'phone' => $faker->phoneNumber,
        'city_id' => $faker->randomElement($cities),
    ];
});
