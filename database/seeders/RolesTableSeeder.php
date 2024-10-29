<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Define roles you want to create
        $roles = ['admin', 'user', 'seller', 'finance', 'login user'];

        // Loop through each role
        foreach ($roles as $roleName) {
            // Check if the role already exists before creating
            Role::firstOrCreate(['name' => $roleName, 'guard_name' => 'web']);
        }
    }
}