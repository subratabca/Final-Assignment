<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
       'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        Gate::resource('users', 'App\Policies\UserPolicy');
        Gate::resource('roles', 'App\Policies\RolePolicy');
        Gate::resource('permissions', 'App\Policies\PermissionPolicy');
        Gate::resource('permissionFors', 'App\Policies\PermissionForPolicy');

        Gate::resource('settings', 'App\Policies\SettingPolicy');
        Gate::resource('companies', 'App\Policies\CompanyPolicy');
        Gate::resource('categories', 'App\Policies\CategoryPolicy');
        Gate::resource('jobs', 'App\Policies\JobPolicy');

        Gate::resource('abouts', 'App\Policies\AboutPolicy');
        Gate::resource('contacts', 'App\Policies\ContactPolicy');
        Gate::resource('blogs', 'App\Policies\BlogPolicy');
    }
}
