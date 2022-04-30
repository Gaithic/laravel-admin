<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'id' => '1',
            'role_id' => 'admin',
        ]);

        
        DB::table('roles')->insert([
            'id' => '2',
            'role_id' => 'manager',
        ]);

        
        DB::table('roles')->insert([
            'id' => '3',
            'role_id' => 'users',
        ]);

    }
}
