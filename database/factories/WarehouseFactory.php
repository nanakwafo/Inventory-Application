<?php
/**
 * Created by PhpStorm.
 * User: kwafo
 * Date: 11/28/2018
 * Time: 11:30 AM
 */
$factory->define(App\Warehouse::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'location' => $faker->locale,
        'purpose' => $faker->randomElement(['warehouse', 'store']),
        'description' => $faker->name,
    ];
});