<?php
/**
 * Created by PhpStorm.
 * User: kwafo
 * Date: 11/30/2018
 * Time: 2:26 AM
 */
$factory->define(App\Warehouseitem::class, function (Faker\Generator $faker) {
    return [
        'goodreceive_grnnumber' => $faker->randomDigit,
        'warehouse_id'=> $faker->randomDigit,
        'supplier_id'=> $faker->randomDigit,
        'productcode'=> $faker->randomDigit,
        'description'=> $faker->name,
        'unit'=> 'unit',
        
        'quantity'=> $faker->randomDigit
    ];
});