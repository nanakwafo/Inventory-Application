<?php

use Illuminate\Database\Seeder;

class profiletableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('profiles')->delete();
        factory(App\profile::class, 1)->create();
    }
}
