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

        $role = Sentinel::findRoleBySlug('Admin');
        $role->permissions = [
            'dasboard' => true,
            'masterentry' => true,
            'product' =>true,
            'inventory' => true,
            'sale' => true,
            'invoice' => true,
            'report' => true,
            'promotion' => true,
            'audit' => true,
            'user' => true,
            'profile' => true,
        ];
        $role->save();


        $credentials=[
            'first_name'=>'Admin',
            'last_name'=>'Mensah',
            'email'=>'admin@gmail.com',
            'password'=>'12345',
            'phonenumber'=>"0243394950",
            'username'=>'admin',
            'sex'=>'male',
            'permissions'=>Sentinel::findRoleByName('Admin')->permissions

        ];
        $user = Sentinel::registerAndActivate($credentials);



        $role=Sentinel::findRoleBySlug('Admin');
        $role->users()->attach($user);
    }
}
