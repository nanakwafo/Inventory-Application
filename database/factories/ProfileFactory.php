<?php
/**
 * Created by PhpStorm.
 * User: kwafo
 * Date: 11/28/2018
 * Time: 12:28 PM
 */
$factory->define(App\profile::class, function (Faker\Generator $faker) {
    return [
        'companyname'=>$faker->company,
        'phone'=>'0878999',
        'email'=>'nanamene@ghs.com',
        'address'=>$faker->address,
        'mobile'=>'343332',
        'website'=>'www.nanakwafomensah.info',
        'fax'=>'223344',
        'logo'=>'default.jpg'
    ];
});