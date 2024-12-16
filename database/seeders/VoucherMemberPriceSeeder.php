<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\VoucherMemberPrice;

class VoucherMemberPriceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Insert sample data
        VoucherMemberPrice::create([
            'voucherProfileId' => 1, // Example ID, replace with actual data
            'memberLevelId' => 1,    // Example ID, replace with actual data
            'pricePoints' => 1000,   // Example points, replace with actual data
        ]);

        VoucherMemberPrice::create([
            'voucherProfileId' => 2,
            'memberLevelId' => 2,
            'pricePoints' => 2000,
        ]);

        // Add more sample data as needed
    }
}
