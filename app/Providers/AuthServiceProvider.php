<?php

namespace App\Providers;

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
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('allow-accounts', function ($user) {
            $userRoles = $user->roles;
              foreach ($userRoles as $userRole) {
               $role = $user->role($userRole->role_id);
                
                if ($role->isAccounting == 1) {
                  return true;
                }
              }
              return false;
           });
        Gate::define('allow-production', function ($user) {
            $userRoles = $user->roles;
              foreach ($userRoles as $userRole) {
               $role = $user->role($userRole->role_id);
                
                if ($role->isProduction == 1) {
                  return true;
                }
              }
              return false;
           });
    }
}
