<?php

/**
 * FILE: app/Filament/Student/Widgets/StatsOverview.php
 *
 * Widget ringkasan di halaman dashboard siswa.
 * Menampilkan 3 stat card: Level, Jadwal, Kelas Aktif.
 */

namespace App\Filament\Student\Widgets;

use App\Models\StudentProfile;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Facades\Auth;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        $user    = Auth::user()->load(['studentProfile', 'enrollments']);
        $profile = $user->studentProfile;

        $levelLabel = $profile?->level
            ? (StudentProfile::LEVEL_LABELS[$profile->level] ?? $profile->level)
            : 'Belum diisi';

        $scheduleLabel = $profile?->class_schedule
            ? (StudentProfile::SCHEDULE_LABELS[$profile->class_schedule] ?? $profile->class_schedule)
            : 'Belum diisi';

        $activeCount = $user->enrollments
            ->where('status', 'active')
            ->count();

        return [
            Stat::make('Level Bahasa Jerman', $levelLabel)
                ->description('Level kamu saat ini')
                ->icon('heroicon-o-academic-cap')
                ->color('primary'),

            Stat::make('Jadwal Kelas', $scheduleLabel)
                ->description('Jadwal pilihan kamu')
                ->icon('heroicon-o-clock')
                ->color('success'),

            Stat::make('Kelas Aktif', $activeCount . ' Kelas')
                ->description('Kelas yang sedang berjalan')
                ->icon('heroicon-o-book-open')
                ->color('warning'),
        ];
    }
}
