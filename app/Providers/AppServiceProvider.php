<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Gate;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        Schema::defaultStringLength(191);

        Gate::before(function ($user, $ability) {
            return optional($user->rol)->rol === $ability ? true : null;
        });

        /*Gate::define('root', function ($user) {
            return $user->role === 'root';
        });

        Gate::define('recepcion', function ($user) {
            return $user->role === 'recepcion';
        });

        Gate::define('medicoConsultaExterna', function ($user) {
            return $user->role === 'medicoConsultaExterna';
        });

        Gate::define('enfermeriaConsultaExterna', function ($user) {
            return $user->role === 'enfermeriaConsultaExterna';
        });

        Gate::define('laboratorioConsultaExterna', function ($user) {
            return $user->role === 'laboratorioConsultaExterna';
        });*/
    }
}
