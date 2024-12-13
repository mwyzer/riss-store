<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Define permissions for each section
        $permissions = [
            // Dashboard permissions
            'dashboard.index',
            'dashboard.statistics',
            'dashboard.chart',

            // User permissions
            'users.index',
            'users.create',
            'users.edit',
            'users.delete',

            // Role permissions
            'roles.index',
            'roles.create',
            'roles.edit',
            'roles.delete',

            // Permission permissions
            'permissions.index',

            // Color permissions
            'colors.index',
            'colors.create',
            'colors.edit',
            'colors.delete',

            // Category permissions
            'categories.index',
            'categories.create',
            'categories.edit',
            'categories.delete',

            // Product permissions
            'products.index',
            'products.create',
            'products.show',
            'products.edit',
            'products.delete',

            // Transaction permissions
            'transactions.index',
            'transactions.show',

            // Slider permissions
            'sliders.index',
            'sliders.create',
            'sliders.delete',

            // Warna permissions
            'warnas.index',
            'warnas.create',
            'warnas.edit',
            'warnas.delete',
        ];

        // Loop through each permission and create if not exists
        foreach ($permissions as $permissionName) {
            Permission::firstOrCreate(['name' => $permissionName, 'guard_name' => 'web']);
        }
    }
}
