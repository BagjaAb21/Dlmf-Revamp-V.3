<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PaymentResource\Pages;
use App\Models\Payment;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Infolists;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\HtmlString;

class PaymentResource extends Resource
{
    protected static ?string $model           = Payment::class;
    protected static ?string $navigationIcon  = 'heroicon-o-credit-card';
    protected static ?string $navigationLabel = 'Data Pembayaran';
    protected static ?string $modelLabel      = 'Pembayaran';
    protected static ?string $pluralModelLabel= 'Data Pembayaran';
    protected static ?string $navigationGroup = 'Transaksi';
    protected static ?int    $navigationSort  = 1;

    public static function form(Form $form): Form
    {
        return $form->schema([]);
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist->schema([
            Infolists\Components\Section::make('Informasi Invoice')
                ->columns(2)
                ->schema([
                    Infolists\Components\TextEntry::make('external_id')
                        ->label('No. Invoice')
                        ->copyable()
                        ->weight('bold')
                        ->columnSpanFull(),

                    Infolists\Components\TextEntry::make('status')
                        ->label('Status')
                        ->badge()
                        ->color(fn (string $state): string => match (strtoupper($state)) {
                            'PAID'    => 'success',
                            'PENDING' => 'warning',
                            'EXPIRED' => 'gray',
                            'FAILED'  => 'danger',
                            default   => 'gray',
                        }),

                    Infolists\Components\TextEntry::make('created_at')
                        ->label('Dibuat Pada')
                        ->dateTime('d/m/Y H:i:s')
                        ->timezone('Asia/Jakarta'),
                ]),

            Infolists\Components\Section::make('Detail Produk')
                ->columns(2)
                ->schema([
                    Infolists\Components\TextEntry::make('product_name')
                        ->label('Nama Produk'),

                    Infolists\Components\TextEntry::make('product.product_code')
                        ->label('Kode Produk')
                        ->placeholder('—'),

                    Infolists\Components\TextEntry::make('product.base_price')
                        ->label('Harga Asli (Base Price)')
                        ->formatStateUsing(fn ($state) => $state
                            ? 'Rp ' . number_format((float) $state, 0, ',', '.')
                            : '—'),

                    Infolists\Components\TextEntry::make('amount')
                        ->label('Harga Bayar (Efektif)')
                        ->formatStateUsing(fn ($state) => 'Rp ' . number_format((float) $state, 0, ',', '.')),

                    Infolists\Components\TextEntry::make('fee')
                        ->label('Biaya Layanan (Fee)')
                        ->state(function (Payment $record): string {
                            $basePrice = $record->product?->base_price ?? $record->amount;
                            $fee = (float) $record->amount - (float) $basePrice;
                            if ($fee <= 0) {
                                return 'Rp 0 (tidak ada tambahan fee)';
                            }
                            return 'Rp ' . number_format($fee, 0, ',', '.');
                        })
                        ->placeholder('—'),

                    Infolists\Components\TextEntry::make('total')
                        ->label('Total Dibayar')
                        ->weight('bold')
                        ->state(fn (Payment $record) => 'Rp ' . number_format((float) $record->amount, 0, ',', '.')),
                ]),

            Infolists\Components\Section::make('Data Pembeli')
                ->columns(2)
                ->schema([
                    Infolists\Components\TextEntry::make('given_names')
                        ->label('Nama Depan'),

                    Infolists\Components\TextEntry::make('surname')
                        ->label('Nama Belakang')
                        ->placeholder('—'),

                    Infolists\Components\TextEntry::make('email')
                        ->label('Email')
                        ->copyable()
                        ->icon('heroicon-m-envelope'),

                    Infolists\Components\TextEntry::make('mobile_number')
                        ->label('No. HP')
                        ->placeholder('—'),
                ]),

            Infolists\Components\Section::make('Detail Pembayaran')
                ->columns(2)
                ->schema([
                    Infolists\Components\TextEntry::make('payment_method')
                        ->label('Metode Pembayaran')
                        ->placeholder('—'),

                    Infolists\Components\TextEntry::make('payment_channel')
                        ->label('Channel Pembayaran')
                        ->placeholder('—'),

                    Infolists\Components\TextEntry::make('payment_destination')
                        ->label('Tujuan Pembayaran')
                        ->placeholder('—'),

                    Infolists\Components\TextEntry::make('xendit_invoice_id')
                        ->label('Xendit Invoice ID')
                        ->copyable()
                        ->placeholder('—'),

                    Infolists\Components\TextEntry::make('paid_at')
                        ->label('Dibayar Pada')
                        ->dateTime('d/m/Y H:i:s')
                        ->timezone('Asia/Jakarta')
                        ->placeholder('Belum dibayar'),

                    Infolists\Components\TextEntry::make('expired_at')
                        ->label('Kadaluarsa Pada')
                        ->dateTime('d/m/Y H:i:s')
                        ->timezone('Asia/Jakarta')
                        ->placeholder('—'),
                ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('external_id')
                    ->label('No. Invoice')
                    ->searchable()
                    ->copyable()
                    ->weight('semibold'),

                Tables\Columns\TextColumn::make('product_name')
                    ->label('Produk / Kelas')
                    ->searchable()
                    ->wrap(),

                Tables\Columns\TextColumn::make('given_names')
                    ->label('Nama Pembeli')
                    ->formatStateUsing(fn ($state, $record) => trim($state . ' ' . $record->surname))
                    ->searchable(['given_names', 'surname']),

                Tables\Columns\TextColumn::make('email')
                    ->label('Email')
                    ->searchable()
                    ->copyable()
                    ->icon('heroicon-m-envelope')
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('amount')
                    ->label('Total Bayar')
                    ->formatStateUsing(fn ($state) => 'Rp ' . number_format((float) $state, 0, ',', '.'))
                    ->sortable(),

                Tables\Columns\TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->color(fn (string $state): string => match (strtoupper($state)) {
                        'PAID'    => 'success',
                        'PENDING' => 'warning',
                        'EXPIRED' => 'gray',
                        'FAILED'  => 'danger',
                        default   => 'gray',
                    })
                    ->sortable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Tanggal Pembelian')
                    ->dateTime('d/m/Y H:i:s')
                    ->timezone('Asia/Jakarta')
                    ->sortable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->label('Status')
                    ->options([
                        'PAID'    => 'Paid',
                        'PENDING' => 'Pending',
                        'EXPIRED' => 'Expired',
                        'FAILED'  => 'Failed',
                    ]),

                Tables\Filters\Filter::make('paid_today')
                    ->label('Dibayar Hari Ini')
                    ->query(fn ($query) => $query->where('status', 'PAID')->whereDate('paid_at', today())),

                Tables\Filters\Filter::make('this_month')
                    ->label('Bulan Ini')
                    ->query(fn ($query) => $query->whereMonth('created_at', now()->month)->whereYear('created_at', now()->year)),
            ])
            ->actions([
                Tables\Actions\ViewAction::make()
                    ->label('Detail')
                    ->icon('heroicon-o-eye')
                    ->modalHeading(fn (Payment $record) => 'Detail Pembayaran — ' . $record->external_id)
                    ->modalWidth('3xl'),
            ])
            ->bulkActions([]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPayments::route('/'),
        ];
    }
}
