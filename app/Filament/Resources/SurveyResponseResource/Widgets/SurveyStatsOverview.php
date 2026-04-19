<?php

namespace App\Filament\Resources\SurveyResponseResource\Widgets;

use App\Models\SurveyResponse;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Facades\DB;

class SurveyStatsOverview extends BaseWidget
{
    protected static ?string $pollingInterval = null;

    protected function getStats(): array
    {
        $total      = SurveyResponse::count();
        $thisMonth  = SurveyResponse::thisMonth()->count();

        /* ── Q1: Sumber terbanyak ─────────────────────────────── */
        $topSource = SurveyResponse::select('q1_source', DB::raw('count(*) as total'))
            ->whereNotNull('q1_source')
            ->groupBy('q1_source')
            ->orderByDesc('total')
            ->first();

        /* ── Q3: Mayoritas minat lanjutan ─────────────────────── */
        $topInterest = SurveyResponse::select('q3_interest', DB::raw('count(*) as total'))
            ->whereNotNull('q3_interest')
            ->groupBy('q3_interest')
            ->orderByDesc('total')
            ->first();

        /* ── Q4: Budget terbanyak ─────────────────────────────── */
        $topBudget = SurveyResponse::select('q4_budget', DB::raw('count(*) as total'))
            ->whereNotNull('q4_budget')
            ->groupBy('q4_budget')
            ->orderByDesc('total')
            ->first();

        /* ── Q2: Pertimbangan terbanyak (flatten JSON array) ──── */
        $allConsiderations = SurveyResponse::whereNotNull('q2_considerations')
            ->pluck('q2_considerations')
            ->flatMap(fn ($arr) => is_array($arr) ? $arr : json_decode($arr, true) ?? [])
            ->filter()
            ->countBy()
            ->sortDesc();

        $topConsideration     = $allConsiderations->keys()->first() ?? '—';
        $topConsiderationCount = $allConsiderations->first() ?? 0;

        /* ── Minat lanjutan: % tertarik ───────────────────────── */
        $interestedCount = SurveyResponse::where('q3_interest', 'Ya, sangat tertarik')->count();
        $interestedPct   = $total > 0 ? round(($interestedCount / $total) * 100) : 0;

        return [
            Stat::make('Total Responden', $total)
                ->description("Bulan ini: {$thisMonth} responden")
                ->descriptionIcon('heroicon-o-users')
                ->color('primary')
                ->chart(
                    SurveyResponse::selectRaw('COUNT(*) as count')
                        ->where('created_at', '>=', now()->subDays(6)->startOfDay())
                        ->groupByRaw('DATE(created_at)')
                        ->orderByRaw('DATE(created_at)')
                        ->pluck('count')
                        ->toArray()
                ),

            Stat::make('Sumber Terbanyak', $topSource?->q1_source ?? '—')
                ->description($topSource ? "{$topSource->total} responden dari sumber ini" : 'Belum ada data')
                ->descriptionIcon('heroicon-o-megaphone')
                ->color('info'),

            Stat::make('Minat Program Lanjutan', "{$interestedPct}%")
                ->description("Menyatakan 'Ya, sangat tertarik' ({$interestedCount} orang)")
                ->descriptionIcon('heroicon-o-academic-cap')
                ->color('success'),

            Stat::make('Pertimbangan Utama', $topConsideration)
                ->description("{$topConsiderationCount}x dipilih responden")
                ->descriptionIcon('heroicon-o-star')
                ->color('warning'),

            Stat::make('Budget Terbanyak', $topBudget?->q4_budget ?? '—')
                ->description($topBudget ? "{$topBudget->total} responden dengan budget ini" : 'Belum ada data')
                ->descriptionIcon('heroicon-o-currency-dollar')
                ->color('danger'),
        ];
    }
}
