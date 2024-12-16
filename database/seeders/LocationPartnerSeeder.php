<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class LocationPartnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Insert sample records into the 'location_partners' table
        DB::table('location_partners')->insert([
            [
                'locationId' => 1,
                'partnerTypeId' => 1,
                'status' => 'active',
                'maxCount' => 100,
                'filledCount' => 50,
                'createdAt' => Carbon::now(),
            ],
            [
                'locationId' => 2,
                'partnerTypeId' => 2,
                'status' => 'inactive',
                'maxCount' => 200,
                'filledCount' => 80,
                'createdAt' => Carbon::now(),
            ],
            [
                'locationId' => 3,
                'partnerTypeId' => 1,
                'status' => 'active',
                'maxCount' => 150,
                'filledCount' => 100,
                'createdAt' => Carbon::now(),
            ],
            // Add more sample records as needed
        ]);
    }
}
