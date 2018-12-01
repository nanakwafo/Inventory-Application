<?php

use Illuminate\Database\Seeder;

class usertableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->delete();
        $credentials=[
            'first_name'=>'Admin',
            'last_name'=>'Mensah',
            'email'=>'admin@gmail.com',
            'password'=>'12345',
            'phonenumber'=>"0243394950",
            'username'=>'admin',
            'sex'=>'male',

        ];
        $user = Sentinel::registerAndActivate($credentials);
        $role=Sentinel::findRoleBySlug('Admin');
        $role->users()->attach($user);
    }
}
