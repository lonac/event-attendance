<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ZoneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $zones = [
            ['name' => 'MJINI KATI'],
            ['name' => 'NKUHUNGU'],
            ['name' => 'NTYUKA'],
            ['name' => 'KISASA'],
            ['name' => 'MAKULU'],
            ['name' => 'ZUZU'],
        ];

        DB::table('zones')->insert($zones);
    }
}
