<?php

namespace App\Providers;

use App\Models\Department;
use App\Models\User;
use App\Policies\DepartmentPolicy;
use App\Policies\UserPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        User::class => UserPolicy::class,
        Department::class => DepartmentPolicy::class,
    ];

    public function boot()
    {
        $this->registerPolicies();

        // Define additional gates if needed
    }
}
