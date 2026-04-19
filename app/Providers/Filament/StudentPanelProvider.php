<?php

namespace App\Providers\Filament;

use App\Filament\Student\Pages\Auth\Login;
use App\Filament\Student\Pages\Auth\Register;
use App\Filament\Student\Pages\BuyCourse;
use App\Filament\Student\Pages\Dashboard;
use App\Filament\Student\Pages\EditProfile;
use App\Filament\Student\Pages\KatalogKursus;
use App\Filament\Student\Pages\MyClasses;
use App\Http\Middleware\EnsureUserIsSiswa;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Support\Enums\MaxWidth;
use Filament\Enums\ThemeMode;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Illuminate\Support\Facades\Route;
use Livewire\Livewire;

class StudentPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->id('student')
            ->path('student')
            ->maxContentWidth(MaxWidth::Full)

            // ── Brand ──────────────────────────────────────────────────────
            ->brandName('DlmF — Area Siswa')
            ->brandLogo(asset('asset/img/logo/logo-Transparant2-v2.png'))
            ->brandLogoHeight('3.7rem')
            ->favicon(asset('asset/img/logo/logo-Transparant3.png'))

            // ── Warna brand: Violet ────────────────────────────────────────
            ->colors([
                'primary' => Color::Violet,
            ])

            // ── Auth pages ────────────────────────────────────────────────
            ->login(Login::class)                       // Custom login (blocks unverified)
            ->registration(Register::class)             // Custom register (inject role=siswa)
            ->passwordReset()

            // ── Custom theme ──────────────────────────────────────────────
            ->viteTheme('resources/css/filament/student/theme.css')

            // ── Dark mode paksa (tanpa toggle) ────────────────────────────
            ->darkMode(false)                          // Sembunyikan toggle
            ->defaultThemeMode(ThemeMode::Dark)         // Selalu dark

            // ── Pages ─────────────────────────────────────────────────────
            ->pages([
                Dashboard::class,
                EditProfile::class,
                KatalogKursus::class,
                MyClasses::class,
                BuyCourse::class,
            ])



            // ── Disable default resources/widgets bawaan Filament ─────────
            ->widgets([])
            ->discoverResources(in: app_path('Filament/Student/Resources'), for: 'App\\Filament\\Student\\Resources')
            // ->discoverPages(in: app_path('Filament/Student/Pages'), for: 'App\\Filament\\Student\\Pages')
            ->discoverWidgets(in: app_path('Filament/Student/Widgets'), for: 'App\\Filament\\Student\\Widgets')

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
                EnsureUserIsSiswa::class,
            ]);
    }
}
