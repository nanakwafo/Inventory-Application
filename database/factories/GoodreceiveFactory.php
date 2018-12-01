<?php
/**
 * Created by PhpStorm.
 * User: kwafo
 * Date: 11/30/2018
 * Time: 2:19 AM
 */

$factory->define(App\Goodreceive::class, function (Faker\Generator $faker) {
    return [
        'grnnumber' => $faker->randomDigit,
        'grndate'=> $faker->date('Y-m-d'),
        'grntype'=> $faker->name,
        'warehouse_id'=> $faker->randomDigit,
        'remark'=> $faker->name
    ];
});