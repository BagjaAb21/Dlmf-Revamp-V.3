<?php

namespace App\Filament\Student\Widgets;

use App\Models\Enrollment;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Filament\Support\Colors\Color;
use Filament\Tables\Columns\Layout\Stack;
use Filament\Tables\Columns\Layout\Split;

class EnrollmentTable extends BaseWidget
{
    protected static ?string $heading = 'Kelas Saya';

    protected int | string | array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        return $table
            ->query(
                Enrollment::query()
                    ->with(['product.productCategory'])
                    ->where('user_id', Auth::id())
                    ->latest()
            )
            ->contentGrid([
                'md' => 2,
                'xl' => 3,
            ])
            ->columns([
                Stack::make([
                    // ── Card Header: Icon & Category ───────────────────
                    Split::make([
                        Tables\Columns\TextColumn::make('product.productCategory.name')
                            ->badge()
                            ->color('primary')
                            ->size('xs'),
                        
                        Tables\Columns\TextColumn::make('status')
                            ->badge()
                            ->formatStateUsing(fn ($state) => match ($state) {
                                'active'    => 'Aktif',
                                default     => 'Tidak Aktif',
                            })
                            ->color(fn ($state) => match ($state) {
                                'active'    => 'success',
                                default     => 'danger',
                            })
                            ->alignEnd(),
                    ])->extraAttributes(['style' => 'margin-bottom: 12px;']),

                    // ── Course Name ────────────────────────────────────
                    Tables\Columns\TextColumn::make('product.name')
                        ->weight('bold')
                        ->size('lg')
                        ->color('white')
                        ->extraAttributes(['style' => 'margin-bottom: 4px; line-height: 1.2;']),

                    Tables\Columns\TextColumn::make('product.product_code')
                        ->size('xs')
                        ->color('gray')
                        ->extraAttributes(['style' => 'margin-bottom: 16px; letter-spacing: 0.05em;']),

                    // ── Info Section: Countdown ─────────────────────────
                    Stack::make([
                        Tables\Columns\TextColumn::make('expires_info')
                            ->getStateUsing(function ($record) {
                                $catName = strtolower($record->product?->productCategory?->name ?? '');
                                if (!str_contains($catName, 'flexilearn')) return '📅 Jadwal dikelola Admin';
                                
                                $durationType = $record->product?->duration_type;
                                $durationValue = ($durationType instanceof \App\Enums\DurationTypeEnum) ? $durationType->value : (string) $durationType;
                                
                                if ($durationValue === 'lifetime') return '♾️ Akses Selamanya';
                                
                                $expiresAt = $record->expires_at;
                                if (!$expiresAt) return '⏳ Menunggu Aktivasi';
                                
                                $now = Carbon::now();
                                $expiry = $expiresAt instanceof Carbon ? $expiresAt : Carbon::parse($expiresAt);
                                if ($expiry->isPast()) return '⛔ Masa Akses Habis';
                                
                                $diff = $now->diff($expiry);
                                if ($diff->days > 0) return "⏳ Sisa {$diff->days} Hari lagi";
                                return "⏳ Sisa {$diff->h} Jam {$diff->i} Menit";
                            })
                            ->color(function($record) {
                                $catName = strtolower($record->product?->productCategory?->name ?? '');
                                if (!str_contains($catName, 'flexilearn')) return 'gray';
                                
                                $expiresAt = $record->expires_at;
                                if (!$expiresAt) return 'gray';

                                $expiry = $expiresAt instanceof Carbon ? $expiresAt : Carbon::parse($expiresAt);
                                if ($expiry->isPast()) return 'danger';
                                
                                return 'warning';
                            })
                            ->size('sm')
                            ->weight('semibold'),
                    ])->extraAttributes([
                        'style' => 'background: rgba(255,255,255,0.03); border: 1px solid rgba(124,58,237,0.15); border-radius: 12px; padding: 10px; margin-bottom: 20px;'
                    ]),

                    // ── Footer / Actions ───────────────────────────────
                    Tables\Columns\TextColumn::make('keterangan_pendek')
                        ->getStateUsing(function ($record) {
                            $catName = strtolower($record->product?->productCategory?->name ?? '');
                            return str_contains($catName, 'flexilearn') 
                                ? 'Materi tersedia di LMS' 
                                : 'Admin akan menghubungi di WA';
                        })
                        ->size('xs')
                        ->color('gray')
                        ->extraAttributes(['style' => 'margin-bottom: 12px; font-style: italic;']),

                ])->extraAttributes([
                    'style' => '
                        background: linear-gradient(145deg, #240b4a, #1a0a35);
                        border: 1px solid rgba(124,58,237,0.2);
                        box-shadow: 0 4px 20px rgba(0,0,0,0.3);
                        border-radius: 20px;
                        padding: 20px;
                        transition: all 0.3s ease;
                        height: 100%;
                    ',
                    'onmouseover' => "this.style.transform='translateY(-5px)'; this.style.borderColor='rgba(124,58,237,0.5)'; this.style.boxShadow='0 12px 30px rgba(124,58,237,0.2)';",
                    'onmouseout' => "this.style.transform=''; this.style.borderColor='rgba(124,58,237,0.2)'; this.style.boxShadow='0 4px 20px rgba(0,0,0,0.3)';"
                ]),
            ])
            ->actions([
                Tables\Actions\Action::make('konfirmasi')
                    ->label('Admin WA')
                    ->icon('heroicon-m-chat-bubble-left-right')
                    ->color('warning')
                    ->button()
                    ->size('sm')
                    ->url(function ($record) {
                        $productName = $record->product?->name ?? '';
                        $message = urlencode("Halo MinFara, mau tanya tentang kelas: {$productName} 🇩🇪");
                        return "https://api.whatsapp.com/send?phone=6289647897616&text={$message}";
                    })
                    ->openUrlInNewTab(),

                Tables\Actions\Action::make('akses_lms')
                    ->label('Masuk Kelas')
                    ->icon('heroicon-m-play-circle')
                    ->color('success')
                    ->button()
                    ->size('sm')
                    ->visible(fn($record) => str_contains(strtolower($record->product?->productCategory?->name ?? ''), 'flexilearn'))
                    ->url('https://lms.mitfara.com', true),
            ])
            ->actionsAlignment('center')
            ->emptyStateHeading('Belum Ada Kelas')
            ->emptyStateDescription('Daftar kelasmu akan muncul di sini setelah divalidasi.')
            ->striped(false)
            ->paginated([12, 24]);
    }
}
