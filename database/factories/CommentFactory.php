<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Comment;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\DB;

$factory->define(Comment::class, function (Faker $faker) {
    return [ 
        'user_id'=> App\User::inRandomOrder()->first()->id,
        'name'=> App\User::inRandomOrder()->first()->name,
        'content'=> $faker->paragraph($nbSentences = 3, $variableNbSentences = true),
        'club_id'=> App\Club::inRandomOrder()->first()->id,
        'approved'=> $faker->boolean,
    ];
});
