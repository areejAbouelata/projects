<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Project;
use Faker\Generator as Faker;

$factory->define(Project::class, function (Faker $faker) {

    return [
        'name' => $faker->word,
        'payment_status' => $faker->word,
        'phone_number' => $faker->word,
        'price' => $faker->word,
        'start_date' => $faker->word,
        'payment_updated_by' => $faker->randomDigitNotNull,
        'client_id' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
