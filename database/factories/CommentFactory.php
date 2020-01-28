<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Comment;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
    return [ 
        'user_id'=> factory('App\User')->create(),
        'name'=> factory('App\User')->create(),
        'content'=> $faker->paragraph($nbSentences = 3, $variableNbSentences = true),
        'club_id'=> factory('App\Club')->create(),
        'approved'=> $faker->boolean,
    ];
});
