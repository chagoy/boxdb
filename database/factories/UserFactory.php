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

$factory->define(App\Boxer::class, function(Faker $faker) {
	return [
		'first_name' => $first = $faker->firstNameMale,
		'last_name' => $last = $faker->lastName, 
		'slug' => str_slug($first . $last),
		'weight_id' => $faker->numberBetween($min = 1, $max = 17),
		'distinction' => $faker->sentence($nbWords = 6, $variableNbWords = true),
		'wins' => $wins = $faker->numberBetween($min = 0, $max = 60),
		'losses' => $faker->numberBetween($min = 0, $max = 15),
		'draws' => $faker->numberBetween($min = 0, $max = 5),
		'knockouts' => $faker->numberBetween($min = 0, $max = $wins)
	];
});

$factory->define(App\Card::class, function (Faker $faker){
	return [
		'date' => $faker->dateTimeThisDecade($max = 'now', $timezone = null),
		'ppv' => $faker->boolean($chanceOfGettingTrue = 50),
		'network_id' => $faker->numberBetween($min = 1, $max = 12),
		'venue' => $faker->company . ' arena',
	];
});

$factory->define(App\Fight::class, function (Faker $faker){
	$card = factory('App\Card')->create();
	return [
		'aside' => $faker->numberBetween($min = 1, $max = 201),
		'bside' => $faker->numberBetween($min = 1, $max = 201),
		'card_id' => $card->id,
		'main_event' => $faker->boolean($chanceOfGettingTrue = 50),
		'description' => $faker->paragraph($nbSentences = 5)
	];
});

$factory->define(App\View::class, function (Faker $faker) {
	$fight = factory('App\Fight')->create();
	return [
		'fight_id' => $fight->id,
		'average' => $avg = $faker->numberBetween($min = 50000, $max = 2000000),
		'peak' => $avg * 1.33
	];
});