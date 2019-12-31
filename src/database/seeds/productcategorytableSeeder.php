<?php

use Illuminate\Database\Seeder;

class productcategorytableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('productcategories')->delete();
        factory(App\Productcategory::class, 10)->create();
    }
}
