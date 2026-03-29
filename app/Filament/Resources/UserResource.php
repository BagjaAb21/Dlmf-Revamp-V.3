<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class UserResource extends Resource
{
    protected static ?string $model           = User::class;
    protected static ?string $navigationIcon  = 'heroicon-o-academic-cap';
    protected static ?string $navigationLabel = 'Data Siswa';
    protected static ?string $modelLabel      = 'Siswa';
    protected static ?string $pluralModelLabel= 'Data Siswa';
    protected static ?string $navigationGroup = 'Manajemen User';
    protected static ?int    $navigationSort  = 1;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make('Informasi Siswa')
                ->columns(2)
                ->schema([
                    Forms\Components\TextInput::make('name')
                        ->label('Nama Lengkap')
                        ->required()
                        ->maxLength(255),

                    Forms\Components\TextInput::make('email')
                        ->label('Email')
                        ->email()
                        ->required()
                        ->unique(User::class, 'email', ignoreRecord: true)
                        ->maxLength(255),

                    Forms\Components\TextInput::make('phone')
                        ->label('No. HP')
                        ->tel()
                        ->maxLength(20),

                    Forms\Components\Placeholder::make('verification_status_label')
                        ->label('Status Verifikasi Saat Ini')
                        ->content(fn ($record) => $record?->email_verified_at 
                            ? new \Illuminate\Support\HtmlString('<div class="bg-success-500/10 text-success-600 dark:text-success-400 px-3 py-2 rounded-lg border border-success-500/20 font-medium">✅ Siswa sudah diverifikasi pada: <br><strong>' . $record->email_verified_at->translatedFormat('l, d F Y — H:i') . '</strong></div>')
                            : new \Illuminate\Support\HtmlString('<div class="bg-danger-500/10 text-danger-600 dark:text-danger-400 px-3 py-2 rounded-lg border border-danger-500/20 font-medium">⚠️ Siswa belum melakukan verifikasi email.</div>')
                        )
                        ->visible(fn ($record) => $record !== null)
                        ->columnSpanFull(),

                    Forms\Components\DateTimePicker::make('email_verified_at')
                        ->label('Set Tanggal Verifikasi (Manual)')
                        ->nullable()
                        ->native(false)
                        ->helperText('Gunakan tombol di samping untuk memverifikasi secara instan dengan waktu sekarang.')
                        ->suffixAction(
                            Forms\Components\Actions\Action::make('verify_now')
                                ->label('Verifikasi Sekarang')
                                ->icon('heroicon-m-check-badge')
                                ->color('success')
                                ->action(function (Forms\Set $set) {
                                    $set('email_verified_at', now()->toDateTimeString());
                                    
                                    \Filament\Notifications\Notification::make()
                                        ->success()
                                        ->title('Manual Verifikasi Sukses!')
                                        ->body('Email siswa telah ditandai sebagai terverifikasi.')
                                        ->send();
                                })
                        ),
                ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Nama')
                    ->searchable()
                    ->sortable()
                    ->weight('semibold'),

                Tables\Columns\TextColumn::make('email')
                    ->label('Email')
                    ->searchable()
                    ->copyable()
                    ->icon('heroicon-m-envelope'),

                Tables\Columns\TextColumn::make('phone')
                    ->label('No. HP')
                    ->placeholder('—')
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\IconColumn::make('email_verified_at')
                    ->label('Terverifikasi')
                    ->boolean()
                    ->trueIcon('heroicon-o-check-badge')
                    ->falseIcon('heroicon-o-x-circle')
                    ->trueColor('success')
                    ->falseColor('danger')
                    ->getStateUsing(fn ($record) => ! is_null($record->email_verified_at)),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Tanggal Daftar')
                    ->dateTime('l, d F Y — H:i')
                    ->sortable()
                    ->tooltip(fn ($record) => $record->created_at->translatedFormat('l, d F Y H:i')),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                Tables\Filters\TrashedFilter::make(),

                Tables\Filters\Filter::make('verified')
                    ->label('Sudah Terverifikasi')
                    ->query(fn (Builder $q) => $q->whereNotNull('email_verified_at')),

                Tables\Filters\Filter::make('unverified')
                    ->label('Belum Terverifikasi')
                    ->query(fn (Builder $q) => $q->whereNull('email_verified_at')),

                Tables\Filters\Filter::make('today')
                    ->label('Daftar Hari Ini')
                    ->query(fn (Builder $q) => $q->whereDate('created_at', today())),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),

                Tables\Actions\Action::make('soft_delete')
                    ->label('Hapus')
                    ->icon('heroicon-o-trash')
                    ->color('danger')
                    ->requiresConfirmation()
                    ->modalHeading('Hapus Siswa')
                    ->modalDescription('Siswa akan dipindahkan ke Tong Sampah. Data histori pembayaran tetap tersimpan. Anda bisa mengembalikan data dari filter Trashed.')
                    ->modalSubmitActionLabel('Ya, Hapus')
                    ->visible(fn ($record) => !$record->trashed())
                    ->action(function ($record) {
                        $record->delete();
                        \Filament\Notifications\Notification::make()
                            ->success()
                            ->title('Siswa berhasil dihapus')
                            ->body('Data siswa telah dipindahkan ke Tong Sampah.')
                            ->send();
                    }),

                Tables\Actions\Action::make('restore')
                    ->label('Pulihkan')
                    ->icon('heroicon-o-arrow-path')
                    ->color('success')
                    ->requiresConfirmation()
                    ->modalHeading('Pulihkan Siswa')
                    ->modalDescription('Akun siswa akan dipulihkan dan kembali aktif.')
                    ->modalSubmitActionLabel('Ya, Pulihkan')
                    ->visible(fn ($record) => $record->trashed())
                    ->action(function ($record) {
                        $record->restore();
                        \Filament\Notifications\Notification::make()
                            ->success()
                            ->title('Siswa berhasil dipulihkan')
                            ->send();
                    }),

                Tables\Actions\Action::make('force_delete')
                    ->label('Hapus Permanen')
                    ->icon('heroicon-o-x-circle')
                    ->color('danger')
                    ->requiresConfirmation()
                    ->modalHeading('Hapus Permanen')
                    ->modalDescription('Data siswa akan dihapus PERMANEN dari database. Tindakan ini TIDAK BISA DIBATALKAN.')
                    ->modalSubmitActionLabel('Ya, Hapus Permanen')
                    ->visible(fn ($record) => $record->trashed())
                    ->action(function ($record) {
                        $record->forceDelete();
                        \Filament\Notifications\Notification::make()
                            ->success()
                            ->title('Siswa dihapus permanen')
                            ->send();
                    }),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getEloquentQuery(): Builder
    {
        // Hanya tampilkan siswa. Filament akan otomatis handle SoftDeletes lewat TrashedFilter.
        return parent::getEloquentQuery()
            ->where('role', 'siswa')
            ->latest();
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListUsers::route('/'),
            'edit'   => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
