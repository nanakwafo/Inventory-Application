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
        'productcode'=> $faker->randomElement(['1', '2','3','4','5', '6','7','8','9','10']),
        'productcategory_id'=> $faker->randomDigit,
        'unit'=> $faker->name,
        'payamount'=> $faker->name,
        'quantity'=> $faker->randomDigit,
        'supplier_id'=> $faker->randomDigit,
        'remark'=> $faker->name

    ];
});