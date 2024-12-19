<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Check if the admin user already exists
        $user = User::firstOrCreate(
            ['email' => 'admin@gmail.com'], // Check uniqueness by email
            [
                'name' => 'Administrator',
                'password' => Hash::make('password'), // Hash the password
            ]
        );

        // Get all permissions
        $permissions = Permission::all();

        // Get or create the "Admin" role
        $role = Role::firstOrCreate(['name' => 'Admin']);

        // Assign all permissions to the role
        if ($permissions->isNotEmpty()) {
            $role->syncPermissions($permissions);
        }

        // Assign the "Admin" role to the user
        $user->assignRole($role);
    }
}
