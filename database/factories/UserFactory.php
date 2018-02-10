<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
    ];
});


$factory->define(App\recipes::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'ingredients' => ['tomate', 'cebolla', 'arroz'],
        'category' => $faker->sentence,
        'timesVoted' => rand(10,100),
        'totalVotes' => rand(0,10),
        'instructions' =>$faker->sentence,
        'description' =>$faker->sentence,
        'author' => $faker->name,
        'horas' => rand(0,2),
        'min' => rand(0,60),
        'img' => $faker->sentence,
        'origen' => $faker->sentence,
    ];

});
