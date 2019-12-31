<?php

use Illuminate\Database\Seeder;

class customertableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('customers')->delete();
        factory(App\Customer::class, 10)->create();
    }
}
