<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // List of roles
        $roles = [
            'admin',
            'customer',
            'seller',
            'partner',
            'finance',
            'marketing',
            'NOC',
            'CSP',
        ];

        // Create roles only if they do not already exist
        foreach ($roles as $role) {
            Role::firstOrCreate(['name' => $role, 'guard_name' => 'web']);
        }
    }
}
