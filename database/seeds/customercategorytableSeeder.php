<?php

use Illuminate\Database\Seeder;

class customercategorytableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('customercategories')->delete();
        factory(App\Customercategory::class, 10)->create();
    }
}
