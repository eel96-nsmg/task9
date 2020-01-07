<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Client;
use Faker\Generator as Faker;

$factory->define(Client::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'company' => $faker->company,
        'position' => $faker->jobTitle,
        'email' => $faker->unique()->safeEmail,
        'mobile' => $faker->phoneNumber,
        'tel' => $faker->phoneNumber,
        'fax' => $faker->phoneNumber,
        'address' => $faker->address,
        'company_address' => $faker->address,
        'image' => $faker->imageUrl($width = 640, $height = 480),
        'user_id' => $faker->numberBetween($min = 1, $max = 20),
    ];
});