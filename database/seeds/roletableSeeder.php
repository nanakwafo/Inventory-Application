<?php

use Illuminate\Database\Seeder;

class roletableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('roles')->delete();
        DB::table('roles')->insert(array(
            array('slug'=>'Admin','name'=>'Admin'),
            array('slug'=>'Rep','name'=>'Rep'),

        ));
    }
}
