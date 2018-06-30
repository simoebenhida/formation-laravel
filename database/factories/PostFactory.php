<?php

use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker) {
    $title = $faker->title;
    return [
        'title' => $title,
        'body' => $faker->randomHtml,
        'slug' => str_slug($title)
    ];
});


$factory->define(App\Comment::class, function (Faker $faker) {
    return [
        'post_id' => $faker->randomNumber,
        'body' => $faker->text,
    ];
});
