<?php

namespace App\Filament\Resources\SurveyResponseResource\Pages;

use App\Filament\Resources\SurveyResponseResource;
use App\Filament\Resources\SurveyResponseResource\Widgets\SurveyStatsOverview;
use App\Filament\Resources\SurveyResponseResource\Widgets\SurveyQ1Chart;
use App\Filament\Resources\SurveyResponseResource\Widgets\SurveyQ2Chart;
use App\Filament\Resources\SurveyResponseResource\Widgets\SurveyQ3Chart;
use App\Filament\Resources\SurveyResponseResource\Widgets\SurveyQ4Chart;
use Filament\Resources\Pages\ListRecords;

class ListSurveyResponses extends ListRecords
{
    protected static string $resource = SurveyResponseResource::class;

    protected function getHeaderActions(): array
    {
        return [];
    }

    protected function getHeaderWidgets(): array
    {
        return [
            SurveyStatsOverview::class,
        ];
    }

    protected function getFooterWidgets(): array
    {
        return [
            SurveyQ1Chart::class,
            SurveyQ2Chart::class,
            SurveyQ3Chart::class,
            SurveyQ4Chart::class,
        ];
    }
}
