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
    }
}
