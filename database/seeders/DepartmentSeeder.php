<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    public function run()
    {
        $departments = [
            ['name' => 'HR', 'description' => 'Human Resources'],
            ['name' => 'IT', 'description' => 'Information Technology'],
            ['name' => 'Finance', 'description' => 'Finance and Accounting'],
            ['name' => 'Marketing', 'description' => 'Marketing and Sales'],
        ];

        foreach ($departments as $department) {
            Department::create($department);
        }
    }
}
