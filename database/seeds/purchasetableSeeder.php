<?php

use Illuminate\Database\Seeder;

class purchasetableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('purchases')->delete();
        factory(App\Purchase::class, 10)->create();
    }
}
