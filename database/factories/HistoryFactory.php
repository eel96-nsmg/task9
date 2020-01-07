<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\History;
use Faker\Generator as Faker;

$factory->define(History::class, function (Faker $faker) {
    return [
        'content' => $faker->text($maxNbChars = 200),
        'client_id' => $faker->numberBetween($min = 1, $max = 20),
    ];
});