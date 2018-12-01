<?php

use Illuminate\Database\Seeder;

class goodreceivetableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('goodreceives')->delete();
        factory(App\Goodreceive::class, 10)->create();
    }
}
