<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Comment;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\DB;

$factory->define(Comment::class, function (Faker $faker) {
    return [ 
        'user_id'=> App\User::inRandomOrder()->first()->id,
        'content'=> $faker->paragraph($nbSentences = 3, $variableNbSentences = true),
        'club_id'=> App\Models\Club::inRandomOrder()->first()->id,
    ];
});
