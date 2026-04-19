<?php

namespace App\Filament\Student\Widgets;

use App\Models\Enrollment;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;
use Illuminate\Support\Facades\Auth;
use Filament\Support\Colors\Color;

class EnrollmentTable extends BaseWidget
{
    protected static ?string $heading = 'Kelas Saya';
    
    // Memberikan prioritas render
    protected int | string | array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        return $table
            ->query(
                Enrollment::query()
                    ->where('user_id', Auth::id())
                    ->latest()
            )
            ->columns([
                Tables\Columns\TextColumn::make('product.name')
                    ->label('NAMA KURSUS')
                    ->description(fn($record) => $record->product?->productCode ?? '-')
                    ->searchable()
                    ->sortable()
                    ->weight('bold')
                    ->color('primary'),

                Tables\Columns\TextColumn::make('product.productCategory.name')
                    ->label('KATEGORI')
                    ->badge()
                    ->getStateUsing(fn($record) => $record->product?->productCategory?->name ?? 'Uncategorized')
                    ->color('info')
                    ->searchable(),

                Tables\Columns\TextColumn::make('status')
                    ->label('STATUS')
                    ->badge()
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'active' => 'Aktif',
                        'expired' => 'Berakhir',
                        'cancelled' => 'Dibatalkan',
                        default => $state,
                    })
                    ->color(fn (string $state): string => match ($state) {
                        'active' => 'success',
                        'expired' => 'danger',
                        'cancelled' => 'warning',
                        default => 'gray',
                    }),

                Tables\Columns\TextColumn::make('started_at')
                    ->label('MULAI')
                    ->date('d M Y')
                    ->sortable()
                    ->color('gray'),

                Tables\Columns\TextColumn::make('expires_at')
                    ->label('BERAKHIR')
                    ->formatStateUsing(fn ($state) => $state ? $state->format('d M Y') : 'Lifetime ♾️')
                    ->sortable()
                    ->color('gray'),
            ])
            ->emptyStateHeading('Belum Ada Kelas')
            ->emptyStateDescription('Daftar kelas yang kamu miliki akan muncul di sini setelah pembayaran divalidasi.')
            ->emptyStateIcon('heroicon-o-book-open')
            ->emptyStateActions([
                Tables\Actions\Action::make('buy')
                    ->label('Lihat Katalog Kursus')
                    ->url(\App\Filament\Student\Pages\KatalogKursus::getUrl())
                    ->button()
                    ->color('primary'),
            ])
            ->paginated([10, 25, 50]);
    }
}
