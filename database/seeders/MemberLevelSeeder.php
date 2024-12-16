<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MemberLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Insert sample records into the 'member_levels' table
        DB::table('member_levels')->insert([
            ['name' => 'Basic'],
            ['name' => 'Premium'],
            ['name' => 'VIP'],
        ]);
    }
}
