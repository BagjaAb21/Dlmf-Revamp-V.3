<?php

/**
 * FILE: app/Filament/Student/Widgets/EnrollmentTable.php
 *
 * Widget tabel kelas yang dimiliki siswa.
 * Hanya tampilkan enrollment milik user yang sedang login.
 */

namespace App\Filament\Student\Widgets;

use App\Models\Enrollment;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;
//use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class EnrollmentTable extends BaseWidget
{
    protected static ?string $heading = 'Kelas Saya';
    protected int|string|array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        return $table
            ->query(
                // Hanya tampilkan enrollment milik user yang login
                Enrollment::query()
                    ->where('user_id', Auth::id())
                    ->with(['product'])
                    ->latest()
            )
            ->columns([
                Tables\Columns\TextColumn::make('product.name')
                    ->label('Nama Kursus')
                    ->searchable()
                    ->weight('semibold'),

                Tables\Columns\TextColumn::make('product.product_category_id')
                    ->label('Kategori')
                    ->badge()
                    ->color('gray'),

                Tables\Columns\BadgeColumn::make('status')
                    ->label('Status')
                    ->colors([
                        'success' => 'active',
                        'danger'  => 'expired',
                        'warning' => 'cancelled',
                    ])
                    ->formatStateUsing(fn (string $state) => match ($state) {
                        'active'    => 'Aktif',
                        'expired'   => 'Berakhir',
                        'cancelled' => 'Dibatalkan',
                        default     => $state,
                    }),

                Tables\Columns\TextColumn::make('started_at')
                    ->label('Mulai')
                    ->date('d M Y')
                    ->placeholder('—'),

                Tables\Columns\TextColumn::make('expires_at')
                    ->label('Berakhir')
                    ->date('d M Y')
                    ->placeholder('Seumur Hidup')
                    ->color(fn ($state) => $state && $state->isPast() ? 'danger' : null),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'active'    => 'Aktif',
                        'expired'   => 'Berakhir',
                        'cancelled' => 'Dibatalkan',
                    ]),
            ])
            ->emptyStateIcon('heroicon-o-book-open')
            ->emptyStateHeading('Belum ada kelas')
            ->emptyStateDescription('Kamu belum mendaftar kelas apapun.')
            ->emptyStateActions([
                Tables\Actions\Action::make('browse')
                    ->label('Lihat Paket Kursus')
                    ->url('/harga')
                    ->icon('heroicon-o-shopping-bag')
                    ->color('primary'),
            ]);
    }
}
