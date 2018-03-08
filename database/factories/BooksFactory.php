<?php

use Faker\Generator as Faker;

$factory->define(App\Books::class, function (Faker $faker) {
    return [
        'title' => $faker->text(20),
        'description' => $faker->text(100),
        'isbn' => $faker->numberBetween($min = 1000, $max = 9000),
        'author' => $faker->name,
        'publisher' => $faker->company
    ];
});
