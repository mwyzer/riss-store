<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create or retrieve user
        $user = User::firstOrCreate(
            ['email' => 'admin@gmail.com'],
            [
                'name'     => 'Administrator',
                'password' => bcrypt('password'),
            ]
        );

        // Get all permissions
        $permissions = Permission::all();

        // Get or create the admin role
        $role = Role::firstOrCreate(['name' => 'admin']);

        // Assign all permissions to the admin role
        $role->syncPermissions($permissions);

        // Assign the admin role to the user
        $user->assignRole($role);
    }
}
