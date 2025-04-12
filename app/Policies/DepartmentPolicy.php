<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Department;
use Illuminate\Auth\Access\HandlesAuthorization;

class DepartmentPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('department_management');
    }

    public function view(User $user, Department $department)
    {
        return $user->hasPermissionTo('department_management');
    }

    public function create(User $user)
    {
        return $user->hasPermissionTo('department_management');
    }

    public function update(User $user, Department $department)
    {
        return $user->hasPermissionTo('department_management');
    }

    public function delete(User $user, Department $department)
    {
        return $user->hasPermissionTo('department_management');
    }
}
