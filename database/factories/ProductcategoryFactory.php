<?php
/**
 * Created by PhpStorm.
 * User: kwafo
 * Date: 11/27/2018
 * Time: 11:02 PM
 */

$factory->define(App\Productcategory::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'description' => $faker->paragraph,
    ];
});