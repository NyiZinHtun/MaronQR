<?php

use Faker\Generator as Faker;
use App\Post;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'title'=>$faker->title,
        'body'=>$faker->paragraph
    ];
});
