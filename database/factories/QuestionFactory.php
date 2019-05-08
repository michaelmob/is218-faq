<?php
/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Profile;
use Illuminate\Support\Str;
use Faker\Generator as Faker;


$factory->define(Question::class, function (Faker $faker) {
    return [
        'body' => $faker->paragraph($nbSentences=3, $variableNbSentences=true)
    ];
});
