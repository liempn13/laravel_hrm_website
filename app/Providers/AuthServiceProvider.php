<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Departments;
use App\Models\Enterprises;
use App\Models\Profiles;
use App\Models\Projects;
use App\Policies\BoardofDirectors;
use App\Policies\DepartmentManager;
use App\Policies\HRDirector;
use App\Policies\HRManager;
use App\Policies\ProjectOwner;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;


class AuthServiceProvider extends ServiceProvider
{

    protected $policies = [];

    public function boot()
    {
        $this->registerPolicies();

        Gate::define('isBoardOfDirectors', function (Profiles $profiles) {
            return $profiles->department_id == 'BoD' && $profiles->permission == 5;
        });

        Gate::define('view_department_members', function (Profiles $profiles) {
            return $profiles->permission == 2 || $profiles->permission > 3;
        });

        Gate::define('isStaff', function (Profiles $profiles) {
            return $profiles->permission == 0;
        });
    }
}
