<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class MaritalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $maritalStatuses = [
            ['name' => 'Single'],
            ['name' => 'Married'],
            ['name' => 'Divorced'],
            ['name' => 'Widowed'],
            ['name' => 'Others'],
        ];

        // Insert data into the marital_status table
        DB::table('marital_statuses')->insert($maritalStatuses);
    }
}
