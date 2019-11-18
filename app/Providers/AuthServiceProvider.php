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
        Gate::define('ql-thonxom', function($user)
        {
            return $user->idRole === 2;
        });
        Gate::define('nguoidung', function($user)
        {
            return $user->idRole === 1;
        });
        Gate::define('ql-xaphuong', function($user)
        {
            return $user->idRole === 3;
        });
        Gate::define('admin', function($user)
        {
            return $user->idRole === 4;
        });
        Gate::define('ql-huyen', function($user)
        {
            return $user->idRole === 6;
        });
        Gate::define('ql-tinh', function($user)
        {
            return $user->idRole === 5;
        });
    }
}
