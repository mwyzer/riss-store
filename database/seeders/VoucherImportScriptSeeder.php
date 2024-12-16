<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VoucherImportScriptSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Insert sample records into the 'voucher_import_scripts' table
        DB::table('voucher_import_scripts')->insert([
            [
                'name' => '12gjpngn65k',
                'password' => '12gjpngn65k',
                'profile' => '12.8GB-12-GB-35Hari',
                'comment' => 'vc-202-11.26.24-a3',
                'limit_bytes_total' => 107374182400, // 100GB in bytes
            ],
            [
                'name' => '15garn2tsee',
                'password' => '15garn2tsee',
                'profile' => '15GB-Kuota-14302-MB-NEW',
                'comment' => 'vc-979-11.19.24-a3',
                'limit_bytes_total' => 14996733952,
            ],
            [
                'name' => '15g87mhrd3w',
                'password' => '15g87mhrd3w',
                'profile' => '15GB-Kuota-14302-MB-NEW',
                'comment' => 'vc-979-11.19.24-a3',
                'limit_bytes_total' => 14996733952,
            ],
        ]);
    }
}
