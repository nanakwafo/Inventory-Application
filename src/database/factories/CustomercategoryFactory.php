<?php
/**
 * Created by PhpStorm.
 * User: kwafo
 * Date: 11/28/2018
 * Time: 12:14 AM
 */

$factory->define(App\Customercategory::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'description' => $faker->paragraph,
    ];
});