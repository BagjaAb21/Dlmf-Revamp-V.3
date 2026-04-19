<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SurveyResponseResource\Pages;
use App\Models\SurveyResponse;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class SurveyResponseResource extends Resource
{
    protected static ?string $model           = SurveyResponse::class;
    protected static ?string $navigationIcon  = 'heroicon-o-chart-bar';
    protected static ?string $navigationLabel = 'Survei Siswa';
    protected static ?string $modelLabel      = 'Jawaban Survei';
    protected static ?string $pluralModelLabel= 'Survei Siswa';
    protected static ?string $navigationGroup = 'Master Data';
    protected static ?int    $navigationSort  = 10;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make('Informasi Responden')
                ->columns(2)
                ->schema([
                    Forms\Components\TextInput::make('respondent_name')->label('Nama')->disabled(),
                    Forms\Components\TextInput::make('respondent_email')->label('Email')->disabled(),
                    Forms\Components\TextInput::make('product_name')->label('Produk Dibeli')->disabled()->columnSpanFull(),
                ]),

            Forms\Components\Section::make('Jawaban Survei')
                ->schema([
                    Forms\Components\TextInput::make('q1_source')
                        ->label('Q1 — Dari mana mengetahui program ini?')
                        ->disabled(),

                    Forms\Components\Textarea::make('q2_considerations')
                        ->label('Q2 — Pertimbangan utama memilih program')
                        ->formatStateUsing(fn ($state) => is_array($state) ? implode(', ', $state) : $state)
                        ->disabled()
                        ->rows(2),

                    Forms\Components\TextInput::make('q2_other_text')
                        ->label('Q2 — Pertimbangan lainnya (isian bebas)')
                        ->disabled()
                        ->visible(fn ($record) => !empty($record?->q2_other_text)),

                    Forms\Components\TextInput::make('q3_interest')
                        ->label('Q3 — Minat program lanjutan / private')
                        ->disabled(),

                    Forms\Components\TextInput::make('q4_budget')
                        ->label('Q4 — Rentang budget')
                        ->disabled(),
                ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Tanggal')
                    ->dateTime('d/m/Y H:i')
                    ->sortable()
                    ->toggleable(),

                Tables\Columns\TextColumn::make('respondent_name')
                    ->label('Nama')
                    ->searchable()
                    ->weight('semibold')
                    ->placeholder('—'),

                Tables\Columns\TextColumn::make('respondent_email')
                    ->label('Email')
                    ->searchable()
                    ->placeholder('—')
                    ->toggleable(),

                Tables\Columns\TextColumn::make('product_name')
                    ->label('Produk')
                    ->searchable()
                    ->placeholder('—')
                    ->limit(30)
                    ->tooltip(fn ($record) => $record->product_name)
                    ->toggleable(),

                Tables\Columns\BadgeColumn::make('q1_source')
                    ->label('Sumber Info')
                    ->color(fn ($state) => match($state) {
                        'Instagram'           => 'pink',
                        'TikTok'              => 'gray',
                        'Google Search'       => 'success',
                        'Website'             => 'info',
                        'WhatsApp (Broadcast)'=> 'success',
                        'Teman / Referral'    => 'warning',
                        'Sekolah / Kampus'    => 'primary',
                        default               => 'secondary',
                    })
                    ->placeholder('—'),

                Tables\Columns\TextColumn::make('q2_considerations')
                    ->label('Pertimbangan')
                    ->formatStateUsing(fn ($state) => is_array($state) ? implode(', ', $state) : $state)
                    ->limit(40)
                    ->tooltip(fn ($record) => is_array($record->q2_considerations) ? implode(', ', $record->q2_considerations) : '')
                    ->placeholder('—'),

                Tables\Columns\BadgeColumn::make('q3_interest')
                    ->label('Minat Lanjutan')
                    ->color(fn ($state) => match($state) {
                        'Ya, sangat tertarik' => 'success',
                        'Mungkin'             => 'warning',
                        'Tidak'               => 'danger',
                        default               => 'secondary',
                    })
                    ->placeholder('—'),

                Tables\Columns\BadgeColumn::make('q4_budget')
                    ->label('Budget')
                    ->color(fn ($state) => match($state) {
                        '< 1 jt'  => 'danger',
                        '1-3 jt'  => 'warning',
                        '3-5 jt'  => 'info',
                        '> 5 jt'  => 'success',
                        default   => 'secondary',
                    })
                    ->placeholder('—'),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                Tables\Filters\SelectFilter::make('q1_source')
                    ->label('Filter Sumber Info')
                    ->options([
                        'Instagram'            => 'Instagram',
                        'TikTok'               => 'TikTok',
                        'Google Search'        => 'Google Search',
                        'Website'              => 'Website',
                        'WhatsApp (Broadcast)' => 'WhatsApp (Broadcast)',
                        'Teman / Referral'     => 'Teman / Referral',
                        'Sekolah / Kampus'     => 'Sekolah / Kampus',
                    ]),

                Tables\Filters\SelectFilter::make('q3_interest')
                    ->label('Filter Minat Lanjutan')
                    ->options([
                        'Ya, sangat tertarik' => 'Ya, sangat tertarik',
                        'Mungkin'             => 'Mungkin',
                        'Tidak'               => 'Tidak',
                    ]),

                Tables\Filters\SelectFilter::make('q4_budget')
                    ->label('Filter Budget')
                    ->options([
                        '< 1 jt' => '< 1 jt',
                        '1-3 jt' => '1–3 jt',
                        '3-5 jt' => '3–5 jt',
                        '> 5 jt' => '> 5 jt',
                    ]),

                Tables\Filters\Filter::make('this_month')
                    ->label('Bulan Ini')
                    ->query(fn (Builder $q) => $q
                        ->whereMonth('created_at', now()->month)
                        ->whereYear('created_at', now()->year)),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListSurveyResponses::route('/'),
            'view'   => Pages\ViewSurveyResponse::route('/{record}'),
        ];
    }
}
