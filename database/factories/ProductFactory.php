<?php
/**
 * Created by PhpStorm.
 * User: kwafo
 * Date: 11/28/2018
 * Time: 3:11 PM
 */

$factory->define(App\Product::class, function (Faker\Generator $faker) {
    return [
        'datereceived' => $faker->date('Y-m-d'),
        'productcode'=> \App\Productcode::all()->random()->productcode,
        'productcategory_id'=> \App\Productcategory::all()->random()->id,
        'unit'=> 'unit',
        'payamount'=> $faker->randomDigit,
        'quantity'=> $faker->randomDigit,
        'supplier_id'=> \App\Supplier::all()->random()->id,
        'remark'=> $faker->paragraph,
        'reorderlimit'=> $faker->randomDigit,
        

    ];
});