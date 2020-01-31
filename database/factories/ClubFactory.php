<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Club;
use Faker\Generator as Faker;



$factory->define(Club::class, function (Faker $faker) {
        $faker = \Faker\Factory::create();
        $faker->addProvider(new \Bezhanov\Faker\Provider\Team($faker));
    return [
        'name'=> $faker->team,
        'sport'=> $faker->sport,
        'description'=> $faker->paragraph($nbSentences = 5, $variableNbSentences = true),
        'address'=> $faker->address,
        'town'=> $faker->city,
        'county'=> $faker->state,
        'postcode'=> $faker->postcode,
        'email'=> $faker->safeEmail,
        'phone_number'=> $faker->phoneNumber,
        'images'=> $faker->imageUrl($width = 400, $height = 200, 'sports'),
        'user_id'=> App\User::inRandomOrder()->first()->id,
    ];
});
