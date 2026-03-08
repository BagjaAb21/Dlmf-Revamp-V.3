<?php

namespace App\Providers\Filament;

use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class AdminMinfaraPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->id('admin-minfara')
            ->path('admin-minfara')
            ->default()

            // ── Brand ──────────────────────────────────────────────────────
            ->brandName('DlmF — Admin')
            ->brandLogo(asset('asset/img/logo/logo-Transparant2-v2.png'))
            ->brandLogoHeight('3rem')
            ->favicon(asset('asset/img/logo/logo-Transparant3.png'))

            // ── Warna brand ────────────────────────────────────────────────
            ->colors([
                'primary' => Color::Violet,
            ])

            // ── Auth ───────────────────────────────────────────────────────
            ->login()
            ->passwordReset()

            // ── Dark mode ─────────────────────────────────────────────────
            ->darkMode(true)

            // ── Auto-discover resources, pages, widgets ────────────────────
            ->discoverResources(
                in: app_path('Filament/Resources'),
                for: 'App\\Filament\\Resources'
            )
            ->discoverPages(
                in: app_path('Filament/Pages'),
                for: 'App\\Filament\\Pages'
            )
            ->discoverWidgets(
                in: app_path('Filament/Widgets'),
                for: 'App\\Filament\\Widgets'
            )
            ->widgets([])

            // ── Middleware ─────────────────────────────────────────────────
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ]);
    }
}
