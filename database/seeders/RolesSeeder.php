<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'level' => 'Admin'
        ]);
        DB::table('roles')->insert([
            'level' => 'Manager'
        ]);
        DB::table('roles')->insert([
            'level' => 'Coordinator'
        ]);
        DB::table('roles')->insert([
            'level' => 'Staff'
        ]);
    }
}
