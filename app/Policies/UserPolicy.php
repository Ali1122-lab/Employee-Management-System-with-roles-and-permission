<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('view_all_employees') ||
               $user->hasPermissionTo('view_department_employees');
    }

    public function view(User $user, User $model)
    {
        if ($user->hasPermissionTo('view_all_employees')) {
            return true;
        }

        if ($user->hasPermissionTo('view_department_employees') &&
            $user->department_id === $model->department_id) {
            return true;
        }

        return $user->id === $model->id;
    }

    public function create(User $user)
    {
        return $user->hasPermissionTo('user_management');
    }

    public function update(User $user, User $model)
    {
        if ($user->hasPermissionTo('user_management')) {
            return true;
        }

        return $user->id === $model->id;
    }

    public function delete(User $user, User $model)
    {
        return $user->hasPermissionTo('user_management');
    }
}
