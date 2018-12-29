<?php
/**
 * Created by PhpStorm.
 * User: kwafo
 * Date: 11/28/2018
 * Time: 11:51 AM
 */

$factory->define(App\Customer::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'phonenumber'=> $faker->phoneNumber,
        'address'=> $faker->address,
        'email'=> $faker->email,
        'customercategory_id'=> \App\Customercategory::all()->random()->id,
    ];
});