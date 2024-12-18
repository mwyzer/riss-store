<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\VoucherMemberPrice;
use Illuminate\Support\Str;

class VoucherMemberPriceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Insert sample data with UUIDs
        VoucherMemberPrice::create([
            'id' => (string) Str::uuid(), // Assign a UUID for the primary key
            'voucherProfileId' => (string) Str::uuid(), // Example UUID, replace with actual data
            'memberLevelId' => (string) Str::uuid(),    // Example UUID, replace with actual data
            'pricePoints' => 1000,   // Example points, replace with actual data
        ]);

        VoucherMemberPrice::create([
            'id' => (string) Str::uuid(), // Assign a UUID for the primary key
            'voucherProfileId' => (string) Str::uuid(), // Example UUID, replace with actual data
            'memberLevelId' => (string) Str::uuid(),    // Example UUID, replace with actual data
            'pricePoints' => 2000,
        ]);

        // Add more sample data as needed
    }
}
