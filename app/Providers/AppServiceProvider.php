<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Vite;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

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
        // Admin directive, like @auth
        Blade::if('admin', fn() : bool => is_admin());

        // Vite aliases
        Vite::macro('logo', fn(string $asset) => $this->asset("resources/images/logo/{$asset}"));
        Vite::macro('image', fn(string $asset) => $this->asset("resources/images/{$asset}"));
        Vite::macro('background', fn(string $asset) => $this->asset("resources/images/backgrounds/{$asset}"));
        Vite::macro('icon', fn(string $asset) => $this->asset("resources/images/icons/{$asset}"));

        //insert view -> this view show bar of numbers under each table.
        // Paginator::defaultView('');
    }
}
