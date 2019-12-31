<?php
/**
 * Created by PhpStorm.
 * User: kwafo
 * Date: 11/28/2018
 * Time: 3:11 PM
 */

$factory->define(App\Purchase::class, function (Faker\Generator $faker) {
    return [
        'datereceived' => $faker->date('Y-m-d'),
        'productcode'=> \App\Productcode::all()->random()->productcode,
        'productcategory_id'=> \App\Productcategory::all()->random()->id,
        'unit'=> 'unit',
//        'barcode'=> $faker->bankAccountNumber,
        'unitprice'=> '1000',
        'payamount'=> $faker->randomDigit,
        'quantity'=> $faker->randomDigit,
        'supplier_id'=> \App\Supplier::all()->random()->id,
        'remark'=> $faker->paragraph,
        'purchaseordernumber'=> $faker->randomDigit,
        

    ];
});