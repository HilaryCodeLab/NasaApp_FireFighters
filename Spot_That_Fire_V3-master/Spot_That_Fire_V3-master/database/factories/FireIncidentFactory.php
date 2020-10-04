<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\FireIncident;
use Faker\Generator as Faker;

$factory->define(FireIncident::class, function (Faker $faker) {
    return [
        'title'=>$faker->title(),
        'family_name' => $faker->firstName,
        'given_name'=>$faker->lastName,
        'email'=>$faker->email->unique()->safeEmail,
        'phone_number'=>$faker->phoneNumber,
        'message'=>$faker->paragraph

    ];
});
