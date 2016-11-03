<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //seed superadmin
        DB::table('users')->insert([
            'name' => 'Nguyen Minh Hiep',
            'email' => 'nguyen.minh.hiep@framgia.com',
            'password' => bcrypt('123456'),
            'avatar' => 'user_files//default-avatar.png',
            'role' => '3'
        ]);
        DB::table('users')->insert([
            'name' => 'Ngo Van Hieu',
            'email' => 'ngo.van.hieu@framgia.com',
            'password' => bcrypt('123456'),
            'avatar' => 'user_files//default-avatar.png',
            'role' => '3'
        ]);
    }
}
