<?php

namespace App\Providers;

use App\Permission;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        //
        foreach ($this->getPermission() as $p) {
            Gate::define($p->permission, function ($user) use ($p) {
                return $user->hasRole($p->roles);
            });
        }
    }

    protected function getPermission()
    {
        return Permission::with('roles')->get();
    }
}