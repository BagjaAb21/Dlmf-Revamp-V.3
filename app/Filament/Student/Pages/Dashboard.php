<?php

/**
 * FILE: app/Filament/Student/Pages/Dashboard.php
 *
 * Halaman dashboard utama panel siswa.
 * Stats ditampilkan langsung di view (bukan widget),
 * hanya EnrollmentTable yang tetap sebagai footer widget.
 */

namespace App\Filament\Student\Pages;

use Filament\Pages\Page;
use Illuminate\Support\Facades\Auth;

class Dashboard extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-home';

    protected static ?string $navigationLabel = 'Dashboard';

    protected static ?string $title = 'Dashboard';

    protected static ?int $navigationSort = 1;

    protected static string $view = 'filament.student.pages.dashboard';

    /**
     * Data yang dikirim ke view.
     */
    public function getViewData(): array
    {
        $user = Auth::user()->load('studentProfile', 'enrollments');
        $profile = $user->studentProfile;

        $isProfileComplete = $profile
            && $profile->city
            && $profile->level
            && $profile->class_schedule;

        return [
            'user' => $user,
            'profile' => $profile,
            'isProfileComplete' => $isProfileComplete,
        ];
    }
}
