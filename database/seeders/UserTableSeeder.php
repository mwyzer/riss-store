<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create or fetch the admin user
        $user = User::firstOrCreate(
            ['email' => 'admin@gmail.com'],
            [
                'id' => (string) Str::uuid(),
                'name' => 'Administrator',
                'password' => Hash::make('password'),
            ]
        );
        
       //get all permissions
       $permissions = Permission::all();

       //get role admin
       $role = Role::find(1);

       //assign permission to role
       $role->syncPermissions($permissions);

       //assign role to user
       $user->assignRole($role);
    }
}
