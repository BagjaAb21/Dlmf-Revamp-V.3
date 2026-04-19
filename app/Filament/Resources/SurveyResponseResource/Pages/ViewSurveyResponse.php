<?php

namespace App\Filament\Resources\SurveyResponseResource\Pages;

use App\Filament\Resources\SurveyResponseResource;
use Filament\Resources\Pages\ViewRecord;
use Filament\Actions;
use Filament\Infolists\Infolist;
use Filament\Infolists\Components;

class ViewSurveyResponse extends ViewRecord
{
    protected static string $resource = SurveyResponseResource::class;

    public function infolist(Infolist $infolist): Infolist
    {
        return $infolist->schema([
            Components\Section::make('Informasi Responden')
                ->columns(2)
                ->schema([
                    Components\TextEntry::make('respondent_name')->label('Nama'),
                    Components\TextEntry::make('respondent_email')->label('Email'),
                    Components\TextEntry::make('product_name')->label('Produk Dibeli')->columnSpanFull(),
                    Components\TextEntry::make('created_at')->label('Tanggal Isi')->dateTime('d M Y, H:i'),
                ]),

            Components\Section::make('Jawaban Survei')
                ->schema([
                    Components\TextEntry::make('q1_source')
                        ->label('Q1 — Dari mana mengetahui program ini?')
                        ->badge()
                        ->color('primary'),

                    Components\TextEntry::make('q2_considerations')
                        ->label('Q2 — Pertimbangan utama memilih program')
                        ->formatStateUsing(fn ($state) => is_array($state) ? implode(' • ', $state) : $state)
                        ->badge()
                        ->separator('•'),

                    Components\TextEntry::make('q2_other_text')
                        ->label('Q2 — Keterangan Lainnya')
                        ->placeholder('—')
                        ->visible(fn ($record) => !empty($record?->q2_other_text)),

                    Components\TextEntry::make('q3_interest')
                        ->label('Q3 — Minat program lanjutan / private')
                        ->badge()
                        ->color(fn ($state) => match($state) {
                            'Ya, sangat tertarik' => 'success',
                            'Mungkin'             => 'warning',
                            'Tidak'               => 'danger',
                            default               => 'gray',
                        }),

                    Components\TextEntry::make('q4_budget')
                        ->label('Q4 — Rentang budget')
                        ->badge()
                        ->color(fn ($state) => match($state) {
                            '< 1 jt'  => 'danger',
                            '1-3 jt'  => 'warning',
                            '3-5 jt'  => 'info',
                            '> 5 jt'  => 'success',
                            default   => 'gray',
                        }),
                ]),
        ]);
    }
}
