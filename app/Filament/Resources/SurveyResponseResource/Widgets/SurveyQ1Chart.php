<?php

namespace App\Filament\Resources\SurveyResponseResource\Widgets;

use App\Models\SurveyResponse;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class SurveyQ1Chart extends ChartWidget
{
    protected static ?string $heading = 'Q1 — Sumber Info Program';
    protected static ?string $description = 'Dari mana siswa pertama kali mengetahui program ini';
    protected static ?int    $sort = 2;
    protected static ?string $maxHeight = '250px';
    protected int | string | array $columnSpan = 1;

    protected function getData(): array
    {
        $data = SurveyResponse::select('q1_source', DB::raw('count(*) as total'))
            ->whereNotNull('q1_source')
            ->groupBy('q1_source')
            ->orderByDesc('total')
            ->get();

        return [
            'datasets' => [
                [
                    'label'           => 'Jumlah Responden',
                    'data'            => $data->pluck('total')->toArray(),
                    'backgroundColor' => [
                        '#E1306C', // Instagram pink
                        '#010101', // TikTok black
                        '#4285F4', // Google blue
                        '#667EEA', // Website purple
                        '#25D366', // WhatsApp green
                        '#FF9800', // Referral orange
                        '#8BC34A', // School green
                    ],
                    'borderColor'     => 'transparent',
                    'borderWidth'     => 0,
                ],
            ],
            'labels' => $data->pluck('q1_source')->toArray(),
        ];
    }

    protected function getType(): string
    {
        return 'doughnut';
    }
}
