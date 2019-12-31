<?php

use Illuminate\Database\Seeder;

class productcodetableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('productcodes')->delete();
        factory(App\Productcode::class, 5)->create();
    }
}
