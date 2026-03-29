<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\User;
use App\Observers\UserObserver;


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
        // Auto-create student_profile saat user baru register
        User::observe(UserObserver::class);

        // Global Bootstrap Icons for Filament Admin Preview
        \Filament\Support\Facades\FilamentView::registerRenderHook(
            'panels::head.done',
            fn () => new \Illuminate\Support\HtmlString('<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">'),
        );
    }
}
