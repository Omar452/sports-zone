<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Club;
use Faker\Generator as Faker;
use Faker\Factory as FakerFactory;




$factory->define(Club::class, function (Faker $faker) {
        $faker = \Faker\Factory::create();
        $faker->addProvider(new \Bezhanov\Faker\Provider\Team($faker));
        $faker->addProvider(new \Bezhanov\Faker\Provider\Placeholder($faker));
        $fakerGB = FakerFactory::create('en_GB');
        $sport= $faker->sport;
        $city = $fakerGB->city;
        $creatures = $faker->creature;
        
    return [
        'name'=> $city.' '.$sport.' '.$creatures,
        'sports'=> $sport,
        'description'=> $faker->paragraph($nbSentences = 5, $variableNbSentences = true),
        'price'=> $faker->numberBetween($min = 15, $max = 100),
        'address'=> $faker->streetAddress,
        'city'=> $city,
        'county'=> $fakerGB->county,
        'postcode'=> $fakerGB->postcode,
        'email'=> $fakerGB->safeEmail,
        'phone_number'=> $fakerGB->phoneNumber,
        'user_id'=> \App\User::inRandomOrder()->first()->id
    ];
});
