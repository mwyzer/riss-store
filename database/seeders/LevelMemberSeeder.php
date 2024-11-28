<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\LevelMember;

class LevelMemberSeeder extends Seeder
{
    public function run()
    {
        LevelMember::create([
            'name' => 'Silver',
            'point_multiplier' => 1,
            'bonus_points' => 4,
            'minimum_spending' => 0,
            'maximum_spending' => 299000,
            'requirements' => json_encode([
                'Alamat Sekarang',
                'Foto Selfie',
            ]),
        ]);

        LevelMember::create([
            'name' => 'Gold',
            'point_multiplier' => 2,
            'bonus_points' => 6,
            'minimum_spending' => 300000,
            'maximum_spending' => 999000,
            'requirements' => json_encode([
                'Alamat Sekarang',
                'Foto Selfie',
                'Verifikasi WhatsApp',
            ]),
        ]);

        LevelMember::create([
            'name' => 'Platinum',
            'point_multiplier' => 3,
            'bonus_points' => 8,
            'minimum_spending' => 1000000,
            'maximum_spending' => null,
            'requirements' => json_encode([
                'Alamat Sekarang',
                'Foto Selfie',
                'Verifikasi WhatsApp',
                'Verifikasi KTP',
            ]),
        ]);
    }
}
