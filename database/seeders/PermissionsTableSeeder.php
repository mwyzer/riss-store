<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // List of permissions
        $permissions = [
            // Dashboard permissions
            ['name' => 'dashboard.index', 'guard_name' => 'web'],
            ['name' => 'dashboard.statistics', 'guard_name' => 'web'],
            ['name' => 'dashboard.chart', 'guard_name' => 'web'],

            // User permissions
            ['name' => 'users.index', 'guard_name' => 'web'],
            ['name' => 'users.create', 'guard_name' => 'web'],
            ['name' => 'users.edit', 'guard_name' => 'web'],
            ['name' => 'users.delete', 'guard_name' => 'web'],

            // Role permissions
            ['name' => 'roles.index', 'guard_name' => 'web'],
            ['name' => 'roles.create', 'guard_name' => 'web'],
            ['name' => 'roles.edit', 'guard_name' => 'web'],
            ['name' => 'roles.delete', 'guard_name' => 'web'],

            // Permissions permissions
            ['name' => 'permissions.index', 'guard_name' => 'web'],

            // Colors permissions
            ['name' => 'colors.index', 'guard_name' => 'web'],
            ['name' => 'colors.create', 'guard_name' => 'web'],
            ['name' => 'colors.edit', 'guard_name' => 'web'],
            ['name' => 'colors.delete', 'guard_name' => 'web'],

            // Categories permissions
            ['name' => 'categories.index', 'guard_name' => 'web'],
            ['name' => 'categories.create', 'guard_name' => 'web'],
            ['name' => 'categories.edit', 'guard_name' => 'web'],
            ['name' => 'categories.delete', 'guard_name' => 'web'],

            // Products permissions
            ['name' => 'products.index', 'guard_name' => 'web'],
            ['name' => 'products.create', 'guard_name' => 'web'],
            ['name' => 'products.show', 'guard_name' => 'web'],
            ['name' => 'products.edit', 'guard_name' => 'web'],
            ['name' => 'products.delete', 'guard_name' => 'web'],

            // Transactions permissions
            ['name' => 'transactions.index', 'guard_name' => 'web'],
            ['name' => 'transactions.show', 'guard_name' => 'web'],

            // Sliders permissions
            ['name' => 'sliders.index', 'guard_name' => 'web'],
            ['name' => 'sliders.create', 'guard_name' => 'web'],
            ['name' => 'sliders.delete', 'guard_name' => 'web'],
        ];

        // Create permissions only if they do not already exist
        foreach ($permissions as $permission) {
            Permission::firstOrCreate($permission);
        }
    }
}
