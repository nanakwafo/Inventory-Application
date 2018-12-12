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
        'warehouse_id'=> \App\Warehouse::all()->random()->id,
        'supplier_id'=> \App\Supplier::all()->random()->id,
        'productcode'=> \App\Productcode::all()->random()->productcode,
        'description'=> $faker->paragraph,
        'unit'=> 'unit',
        'quantity'=> $faker->randomDigit
    ];
});