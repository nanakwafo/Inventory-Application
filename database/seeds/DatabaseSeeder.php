<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(grntypetableSeeder::class);
        $this->call(productcodetableSeeder::class);
         $this->call(productcategorytableSeeder::class);
         $this->call(customercategorytableSeeder::class);
         $this->call(roletableSeeder::class);
         $this->call(usertableSeeder::class);
         $this->call(warehouseSeeder::class);
         $this->call(customertableSeeder::class);
         $this->call(profiletableSeeder::class);
         $this->call(suppliertableSeeder::class);
         $this->call(producttableSeeder::class);
         $this->call(goodreceivetableSeeder::class);
         $this->call(warehouseitemtableSeeder::class);

    }
}
