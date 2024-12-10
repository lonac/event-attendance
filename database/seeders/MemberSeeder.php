<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File; // To read the file
use App\Models\Member;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // Get the content of the JSON file
         $json = File::get(database_path('seeders/member.json'));
         $members = json_decode($json, true); // Decode the JSON content
 
         // Loop through each member and insert into the database
         foreach ($members as $member) {
             Member::create([
                 'firstname' => $member['firstname'],
                 'lastname' => $member['lastname'],
                 'marital_status' => $member['marital_status'],  // Can be null
                 'phone_number' => $member['phone_number'],      // Can be null
             ]);
         }
    }
}
