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
        // Check if the user already exists
        $user = User::firstOrCreate(
            ['email' => 'admin@gmail.com'],
            [
                'name' => 'Administrator',
                'password' => Hash::make('password'), // Use bcrypt or Hash
            ]
        );

        // Get all permissions
        $permissions = Permission::all();

        // Get the admin role or create it if it doesn't exist
        $role = Role::firstOrCreate(['name' => 'Admin']);

        // Assign all permissions to the role
        $role->syncPermissions($permissions);

        // Assign the role to the user
        $user->assignRole($role);

        // Generate 50 random users
        User::factory()->count(50)->create();
    }
}
