<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\Profiles;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;


class AuthServiceProvider extends ServiceProvider
{

    protected $policies = [];

    public function boot()
    {
        $this->registerPolicies();

        Gate::define('Manage Staffs info', function (Profiles $profiles) {
            return $profiles->hasPermission('Manage Staffs info');
        });

        Gate::define('Manage your department members', function (Profiles $profiles) {
            return $profiles->hasPermission('Manage your department members');
        });

        Gate::define('Create & Delete Project', function (Profiles $profiles) {
            return $profiles->hasPermission('Create & Delete Project');
        });

        Gate::define('Manage BoD & HR accounts', function (Profiles $profiles) {
            return $profiles->hasPermission('Manage BoD & HR accounts');
        });
    }
}