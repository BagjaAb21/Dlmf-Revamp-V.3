<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BenefitMasterResource\Pages;
//use App\Filament\Resources\BenefitMasterResource\RelationManagers;
use App\Models\BenefitMaster;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
// use Illuminate\Database\Eloquent\Builder;
// use Illuminate\Database\Eloquent\SoftDeletingScope;

class BenefitMasterResource extends Resource
{
    protected static ?string $model           = BenefitMaster::class;
    protected static ?string $navigationIcon  = 'heroicon-o-check-circle';
    protected static ?string $navigationGroup = 'Master Data';
    protected static ?string $navigationLabel = 'Master Benefit';
    protected static ?string $modelLabel      = 'Benefit';
    protected static ?string $pluralModelLabel = 'Master Benefit';
    protected static ?int    $navigationSort  = 2;

    // ── Form ────────────────────────────────────────────────────────

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make('Detail Benefit')
                ->columns(2)
                ->schema([
                    Forms\Components\TextInput::make('label')
                        ->label('Label Benefit')
                        ->required()
                        ->maxLength(200)
                        ->placeholder('Contoh: 20x Pertemuan, Free Modul, Sertifikat...')
                        ->columnSpanFull(),

                    Forms\Components\TextInput::make('icon')
                        ->label('Icon / Emoji')
                        ->maxLength(50)
                        ->placeholder('📅')
                        ->helperText('Gunakan emoji. Tampil di sebelah label benefit.'),

                    Forms\Components\TextInput::make('sort_order')
                        ->label('Urutan Tampil')
                        ->numeric()
                        ->default(0)
                        ->minValue(0),

                    Forms\Components\Toggle::make('is_active')
                        ->label('Aktif')
                        ->default(true)
                        ->helperText('Benefit nonaktif tidak muncul di picker saat menambah produk.')
                        ->columnSpanFull(),
                ]),
        ]);
    }

    // ── Table ───────────────────────────────────────────────────────

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('sort_order')
                    ->label('#')
                    ->sortable()
                    ->width(60),

                Tables\Columns\TextColumn::make('icon')
                    ->label('Icon')
                    ->width(60),

                Tables\Columns\TextColumn::make('label')
                    ->label('Label Benefit')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('products_count')
                    ->label('Dipakai di Produk')
                    ->counts('products')
                    ->badge()
                    ->color('success'),

                Tables\Columns\IconColumn::make('is_active')
                    ->label('Aktif')
                    ->boolean(),
            ])
            ->defaultSort('sort_order')
            ->reorderable('sort_order')
            ->filters([
                Tables\Filters\TernaryFilter::make('is_active')
                    ->label('Status'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
                    ->before(function ($record, Tables\Actions\DeleteAction $action) {
                        if ($record->products()->count() > 0) {
                            $action->cancel();
                            Notification::make()
                                ->danger()
                                ->title('Tidak dapat dihapus')
                                ->body("Benefit ini digunakan oleh {$record->products()->count()} produk.")
                                ->send();
                        }
                    }),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBenefitMasters::route('/'),
            'create' => Pages\CreateBenefitMaster::route('/create'),
            'edit' => Pages\EditBenefitMaster::route('/{record}/edit'),
        ];
    }
}
