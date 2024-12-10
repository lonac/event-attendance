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
            ['name' => 'TANZANIA'],
            ['name' => 'KENYA'],
            ['name' => 'UGANDA'],
        ];

        DB::table('zones')->insert($zones);
    }
}
