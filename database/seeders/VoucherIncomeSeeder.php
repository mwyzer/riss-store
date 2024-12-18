<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ServiceType;
use Illuminate\Support\Str;

class ServiceTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ServiceType::create([
            'id' => (string) Str::uuid(), // Assign a UUID for the primary key
            'name' => 'Dedicated',
            'code' => 'DC',
            'availability' => 'Tidak ada'
        ]);

        ServiceType::create([
            'id' => (string) Str::uuid(), // Assign a UUID for the primary key
            'name' => 'Broadband',
            'code' => 'BD',
            'availability' => 'Tidak ada'
        ]);

        ServiceType::create([
            'id' => (string) Str::uuid(), // Assign a UUID for the primary key
            'name' => 'Voucher',
            'code' => 'VC',
            'availability' => 'Tersedia'
        ]);
    }
}
