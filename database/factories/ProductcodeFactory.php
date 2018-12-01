<?php
/**
 * Created by PhpStorm.
 * User: kwafo
 * Date: 11/30/2018
 * Time: 6:17 PM
 */
$factory->define(App\Productcode::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'productcode'=> $faker->randomElement(['1','2','3','4','5','6','7','8','9','10']),

    ];
});