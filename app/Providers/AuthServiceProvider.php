<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Schema;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Schema::defaultStringLength(200);

        Gate::define("prestataire", function (User $user) {
            return $user->hasProfil("prestataire");
        });

        Gate::define("secretaire", function (User $user) {
            return $user->hasProfil("secretaire");
        });

        Gate::define("adherent", function (User $user) {
            return $user->hasProfil("adherent");
        });

        Gate::define("admin", function (User $user) {
            return $user->hasProfil("admin");
        });

        Gate::after(function (User $user) {
            return $user->hasProfil("superadmin");
        });
    }
}
