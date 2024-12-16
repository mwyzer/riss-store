<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class VoucherIncomeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Insert multiple sample records into the 'voucher_income' table
        DB::table('voucher_income')->insert([
            [
                'voucherTypeId' => 1, // example voucher type ID
                'income' => 1000, // example income
                'points' => 10, // example points
                'createdAt' => Carbon::now(), // current timestamp
            ],
            [
                'voucherTypeId' => 2, // example voucher type ID
                'income' => 2000, // example income
                'points' => 20, // example points
                'createdAt' => Carbon::now(), // current timestamp
            ],
            [
                'voucherTypeId' => 3, // example voucher type ID
                'income' => 1500, // example income
                'points' => 15, // example points
                'createdAt' => Carbon::now(), // current timestamp
            ],
            // Add more sample data as needed
        ]);
    }
}
