<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class DivisionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('divisions')->insert([
            ['division_name' => 'Administrator'],
            ['division_name' => 'Admin Produksi'],
            ['division_name' => 'Admin K3'],
            ['division_name' => 'Admin TI'],
            ['division_name' => 'Admin Pemasaran'],
        ]);
    }
}
