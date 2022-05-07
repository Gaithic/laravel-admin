<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'username'  => 'Admin',
            'email' => 'admin@admin.com',
            'contact' => '1234567890',
            'role_id' => '1',
            'password' => bcrypt('password')
        ]);

        // DB::table('users')->insert([
        //     'username'  => 'Manager',
        //     'email' => 'manager@gmail.com',
        //     'contact' => '1234566541',
        //     'role_id' => '2',
        //     'password' => bcrypt('password')
        // ]);

        // DB::table('users')->insert([
        //     'username'  => 'Anshul Kumar',
        //     'email' => 'anshul@gmail.com',
        //     'contact' => '5486567890',
        //     'role_id' => '3',
        //     'password' => bcrypt('password')
        // ]);


        // DB::table('users')->insert([
        //     'username'  => 'Mohit',
        //     'email' => 'mohilt@gmail.com',
        //     'contact' => '1234566541',
        //     'role_id' => '3',
        //     'password' => bcrypt('password')
        // ]);

        // DB::table('users')->insert([
        //     'username'  => 'Dimple',
        //     'email' => 'dimple@gmail.com',
        //     'contact' => '1234566541',
        //     'role_id' => '3',
        //     'password' => bcrypt('password')
        // ]);


        // DB::table('users')->insert([
        //     'username'  => 'Raj',
        //     'email' => 'raj@gmail.com',
        //     'contact' => '1234566541',
        //     'role_id' => '3',
        //     'password' => bcrypt('password')
        // ]);

    }
}
