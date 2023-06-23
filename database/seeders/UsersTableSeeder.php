<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'username' => 'admin',
            'name' => 'Administrator',
            'email' => 'admin@example.com',
            'password' => Hash::make('admin123'),
            'division_id' => 1,
            'role' => "Administrator",
        ]);
        DB::table('users')->insert([
            'username' => 'adminpemasaran',
            'name' => 'Admin Pemasaran',
            'email' => 'admin@pemasaran.com',
            'password' => Hash::make('adminpemasaran123'),
            'division_id' => 5,
            'role' => "Admin",
        ]);
        DB::table('users')->insert([
            'username' => 'vppemasaran',
            'name' => 'VP Pemasaran',
            'email' => 'vp@pemasaran.com',
            'password' => Hash::make('vppemasaran123'),
            'division_id' => 5,
            'role' => "VP",
        ]);
        DB::table('users')->insert([
            'username' => 'adminti',
            'name' => 'Admin TI',
            'email' => 'admin@ti.com',
            'password' => Hash::make('adminti123'),
            'division_id' => 4,
            'role' => "Admin",
        ]);
        DB::table('users')->insert([
            'username' => 'vppemasran',
            'name' => 'VP TI',
            'email' => 'vp@ti.com',
            'password' => Hash::make('vpti123'),
            'division_id' => 4,
            'role' => "VP",
        ]);
    }
}
