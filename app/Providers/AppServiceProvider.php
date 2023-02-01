<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Gate::define('isAdmin', function ($user) {
            return $user->role == "admin";
        });
        Gate::define('isPetugas', function ($user) {
            return $user->role == "petugas";
        });
        Gate::define('isKepala', function ($user) {
            return $user->role == "kepala";
        });
    }
}