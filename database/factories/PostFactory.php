<?php

use Faker\Generator as Faker;
use App\Models\Post;
use Illuminate\Support\Str;

$factory->define(Post::class, function (Faker $faker) {

    $title = $faker->sentence;
    $slug = Str::slug($title);

    return [
        'title' => $title,
        'body' => $faker->paragraph(4),
        'image' => $faker->imageUrl($width = 640, $height = 480),
        'slug' => $slug,
    ];

});
