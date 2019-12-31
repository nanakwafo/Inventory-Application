<?php

use Illuminate\Database\Seeder;

class suppliertableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('suppliers')->delete();
        factory(App\Supplier::class, 10)->create();
    }
}
