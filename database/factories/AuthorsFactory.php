<?php

use Faker\Generator as Faker;

$factory->define(App\Authors::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'location' => $faker->streetAddress
    ];
});
