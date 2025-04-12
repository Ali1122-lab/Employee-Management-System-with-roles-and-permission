<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    public function run()
    {
        // Create permissions
        $permissions = [
            'user_management',
            'department_management',
            'view_all_employees',
            'view_department_employees',
            'manage_own_profile',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        // Create roles
        $adminRole = Role::create(['name' => 'Admin']);
        $managerRole = Role::create(['name' => 'Manager']);
        $employeeRole = Role::create(['name' => 'Employee']);

        // Assign permissions to roles
        $adminRole->givePermissionTo([
            'user_management',
            'department_management',
            'view_all_employees',
        ]);

        $managerRole->givePermissionTo([
            'view_department_employees',
        ]);

        $employeeRole->givePermissionTo([
            'manage_own_profile',
        ]);
    }
}
