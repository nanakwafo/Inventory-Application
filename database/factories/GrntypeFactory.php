<?php
/**
 * Created by PhpStorm.
 * User: kwafo
 * Date: 11/30/2018
 * Time: 5:59 PM
 */
$factory->define(App\Grntype::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,

    ];
});