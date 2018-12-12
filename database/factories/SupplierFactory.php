<?php
/**
 * Created by PhpStorm.
 * User: kwafo
 * Date: 11/28/2018
 * Time: 1:30 PM
 */
$factory->define(App\Supplier::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'phonenumber'=> $faker->phoneNumber,
        'address'=> $faker->city,
        'description'=> $faker->paragraph
    ];
});