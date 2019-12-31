<?php

use Illuminate\Database\Seeder;

class warehouseitemtableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('warehouseitems')->delete();
        factory(App\Warehouseitem::class, 20)->create();
    }
}
