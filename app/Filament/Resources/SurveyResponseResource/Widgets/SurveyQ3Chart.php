<?php

namespace App\Filament\Resources\SurveyResponseResource\Widgets;

use App\Models\SurveyResponse;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class SurveyQ3Chart extends ChartWidget
{
    protected static ?string $heading = 'Q3 — Minat Program Lanjutan';
    protected static ?string $description = 'Distribusi minat siswa terhadap program private / lanjutan';
    protected static ?int    $sort = 4;
    protected static ?string $maxHeight = '250px';
    protected int | string | array $columnSpan = 1;

    protected function getData(): array
    {
        $q3 = SurveyResponse::select('q3_interest', DB::raw('count(*) as total'))
            ->whereNotNull('q3_interest')
            ->groupBy('q3_interest')
            ->orderByRaw("FIELD(q3_interest, 'Ya, sangat tertarik', 'Mungkin', 'Tidak')")
            ->get();

        return [
            'datasets' => [
                [
                    'label'           => 'Minat Lanjutan',
                    'data'            => $q3->pluck('total')->toArray(),
                    'backgroundColor' => ['#10B981', '#F59E0B', '#EF4444'],
                    'borderRadius'    => 6,
                    'yAxisID'         => 'y',
                ],
            ],
            'labels' => $q3->pluck('q3_interest')->toArray(),
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
