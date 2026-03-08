<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductCategoryResource\Pages;
//use App\Filament\Resources\ProductCategoryResource\RelationManagers;
use App\Models\ProductCategory;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
// use Illuminate\Database\Eloquent\Builder;
// use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class ProductCategoryResource extends Resource
{
    protected static ?string $model           = ProductCategory::class;
    protected static ?string $navigationIcon  = 'heroicon-o-tag';
    protected static ?string $navigationGroup = 'Master Data';
    protected static ?string $navigationLabel = 'Kategori Produk';
    protected static ?string $modelLabel      = 'Kategori Produk';
    protected static ?string $pluralModelLabel = 'Kategori Produk';
    protected static ?int    $navigationSort  = 1;

    // ── Form ────────────────────────────────────────────────────────

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make('Informasi Kategori')
                ->columns(2)
                ->schema([
                    Forms\Components\TextInput::make('name')
                        ->label('Nama Kategori')
                        ->required()
                        ->maxLength(150)
                        ->live(onBlur: true)
                        ->afterStateUpdated(function ($state, Forms\Set $set, $record) {
                            // Hanya auto-generate slug saat create baru
                            if (! $record) {
                                $set('slug', Str::slug($state));
                            }
                        })
                        ->columnSpanFull(),

                    Forms\Components\TextInput::make('slug')
                        ->label('Slug')
                        ->required()
                        ->unique(ProductCategory::class, 'slug', ignoreRecord: true)
                        ->maxLength(100)
                        ->helperText('Auto-generate dari nama. Bisa diubah manual jika perlu.'),

                    Forms\Components\TextInput::make('sort_order')
                        ->label('Urutan Tampil')
                        ->numeric()
                        ->default(0)
                        ->minValue(0)
                        ->helperText('Angka lebih kecil = tampil lebih awal'),

                    Forms\Components\Textarea::make('description')
                        ->label('Deskripsi')
                        ->columnSpanFull()
                        ->rows(3)
                        ->maxLength(1000),

                    Forms\Components\Toggle::make('is_active')
                        ->label('Aktif')
                        ->default(true)
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

                Tables\Columns\TextColumn::make('name')
                    ->label('Nama Kategori')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('slug')
                    ->label('Slug')
                    ->color('gray')
                    ->copyable()
                    ->fontFamily('mono')
                    ->size('sm'),

                Tables\Columns\TextColumn::make('products_count')
                    ->label('Jumlah Produk')
                    ->counts('products')
                    ->badge()
                    ->color('info'),

                Tables\Columns\IconColumn::make('is_active')
                    ->label('Aktif')
                    ->boolean(),

                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Diperbarui')
                    ->dateTime('d M Y, H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
                                ->body("Kategori \"{$record->name}\" masih memiliki {$record->products()->count()} produk terkait.")
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
            'index' => Pages\ListProductCategories::route('/'),
            'create' => Pages\CreateProductCategory::route('/create'),
            'edit' => Pages\EditProductCategory::route('/{record}/edit'),
        ];
    }
}
