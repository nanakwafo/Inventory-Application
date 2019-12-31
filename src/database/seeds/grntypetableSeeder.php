<?php

use Illuminate\Database\Seeder;

class grntypetableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('grntypes')->delete();
        factory(App\Grntype::class, 3)->create();
    }
}
