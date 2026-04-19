<?php

namespace App\Filament\Resources\SurveyResponseResource\Widgets;

use App\Models\SurveyResponse;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class SurveyQ4Chart extends ChartWidget
{
    protected static ?string $heading = 'Q4 — Rentang Budget';
    protected static ?string $description = 'Distribusi kesiapan budget siswa untuk program selanjutnya';
    protected static ?int    $sort = 5;
    protected static ?string $maxHeight = '250px';
    protected int | string | array $columnSpan = 1;

    protected function getData(): array
    {
        $orderMap  = ['< 1 jt' => 1, '1-3 jt' => 2, '3-5 jt' => 3, '> 5 jt' => 4];
        $q4 = SurveyResponse::select('q4_budget', DB::raw('count(*) as total'))
            ->whereNotNull('q4_budget')
            ->groupBy('q4_budget')
            ->get()
            ->sortBy(fn ($r) => $orderMap[$r->q4_budget] ?? 99);

        return [
            'datasets' => [
                [
                    'label'           => 'Budget Siswa',
                    'data'            => $q4->pluck('total')->toArray(),
                    'backgroundColor' => ['#EF4444', '#F59E0B', '#3B82F6', '#10B981'],
                    'borderRadius'    => 6,
                    'yAxisID'         => 'y',
                ],
            ],
            'labels' => $q4->pluck('q4_budget')->toArray(),
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
