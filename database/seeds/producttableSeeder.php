<?php

use Illuminate\Database\Seeder;

class producttableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('products')->delete();
        factory(App\Product::class, 10)->create();
    }
}
