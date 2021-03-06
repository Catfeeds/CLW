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

// 写字楼
$factory->define(\App\Models\OfficeBuildingHouse::class, function (Faker $faker) {
    return [
        'building_block_id' => rand(1, 53),
        'unit_price' => rand(30, 100),
        'renovation' => rand(1, 5),
        'constru_acreage' => rand(50, 1200),
    ];
});

//$factory->define(\App\Models\BuildingHasFeature::class, function (Faker $faker) {
//    return [
//        'building_id' => rand(1, 53),
//        'building_block_id' => rand(1, 53)
//    ];
//});
