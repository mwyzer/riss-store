<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ServiceType;

class ServiceTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ServiceType::create(['name' => 'Dedicated', 'code' => 'DC', 'availability' => 'Tidak ada']);
        ServiceType::create(['name' => 'Broadband', 'code' => 'BD', 'availability' => 'Tidak ada']);
        ServiceType::create(['name' => 'Voucher', 'code' => 'VC', 'availability' => 'Tersedia']);
    }
}
