<?php

namespace App\Filament\Resources\SurveyResponseResource\Widgets;

use App\Models\SurveyResponse;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class SurveyQ2Chart extends ChartWidget
{
    protected static ?string $heading = 'Q2 — Pertimbangan Utama Memilih Program';
    protected static ?string $description = 'Faktor apa yang paling sering dipilih siswa';
    protected static ?int    $sort = 3;
    protected static ?string $maxHeight = '250px';
    protected int | string | array $columnSpan = 1;

    protected function getData(): array
    {
        // Flatten JSON arrays and count occurrences
        $counts = SurveyResponse::whereNotNull('q2_considerations')
            ->pluck('q2_considerations')
            ->flatMap(fn ($arr) => is_array($arr) ? $arr : (json_decode($arr, true) ?? []))
            ->filter()
            ->countBy()
            ->sortDesc();

        return [
            'datasets' => [
                [
                    'label'           => 'Jumlah Dipilih',
                    'data'            => $counts->values()->toArray(),
                    'backgroundColor' => [
                        '#667EEA', '#764ba2', '#F59E0B', '#10B981',
                        '#EF4444', '#3B82F6', '#8B5CF6', '#EC4899',
                    ],
                    'borderRadius'    => 6,
                ],
            ],
            'labels' => $counts->keys()->toArray(),
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
