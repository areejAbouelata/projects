<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Note;
use Faker\Generator as Faker;

$factory->define(Note::class, function (Faker $faker) {

    return [
        'title' => $faker->word,
        'note' => $faker->text,
        'user_id' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
