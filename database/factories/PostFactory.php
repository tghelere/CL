<?php

use Faker\Generator as Faker;
use App\Models\Post;
use Illuminate\Support\Str;

$factory->define(Post::class, function (Faker $faker) {

    $title = $faker->sentence;
    $slug = Str::slug($title);

    return [
        'title' => $title,
        'description' => $faker->text($maxNbChars = 150),
        'body' => $faker->paragraph(4),
        'image' => '/img/blog/posts/' . $faker->numberBetween($min = 1, $max = 6) . '.jpg',
        'slug' => $slug,
    ];

});
