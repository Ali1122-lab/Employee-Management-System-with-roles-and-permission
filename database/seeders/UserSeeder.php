<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Create Admin
        $admin = User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'department_id' => 1,
        ]);
        $admin->assignRole('Admin');

        // Create Managers
        $manager1 = User::create([
            'name' => 'HR Manager',
            'email' => 'hr@example.com',
            'password' => Hash::make('password'),
            'department_id' => 1,
        ]);
        $manager1->assignRole('Manager');

        $manager2 = User::create([
            'name' => 'IT Manager',
            'email' => 'it@example.com',
            'password' => Hash::make('password'),
            'department_id' => 2,
        ]);
        $manager2->assignRole('Manager');

        // Create Employees
        $employee1 = User::create([
            'name' => 'HR Employee',
            'email' => 'hremployee@example.com',
            'password' => Hash::make('password'),
            'department_id' => 1,
        ]);
        $employee1->assignRole('Employee');

        $employee2 = User::create([
            'name' => 'IT Employee',
            'email' => 'itemployee@example.com',
            'password' => Hash::make('password'),
            'department_id' => 2,
        ]);
        $employee2->assignRole('Employee');
    }
}
