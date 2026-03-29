<?php

namespace App\Filament\Resources;

use App\Enums\DurationTypeEnum;
use App\Filament\Resources\ProductResource\Pages;
//use App\Filament\Resources\ProductResource\RelationManagers;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductDiscount;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Notifications\Notification;
use Filament\Forms\Components\Actions\Action;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
//use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\HtmlString;

class ProductResource extends Resource
{
    protected static ?string $model            = Product::class;
    protected static ?string $navigationIcon   = 'heroicon-o-shopping-bag';
    protected static ?string $navigationGroup  = 'Master Data';
    protected static ?string $navigationLabel  = 'Daftar Produk';
    protected static ?string $modelLabel       = 'Produk';
    protected static ?string $pluralModelLabel = 'Produk';
    protected static ?int    $navigationSort   = 3;

    // ══════════════════════════════════════════════════════════════
    // FORM
    // ══════════════════════════════════════════════════════════════

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Tabs::make('ProductTabs')
                ->columnSpanFull()
                ->persistTabInQueryString()
                ->tabs([

                    // ──────────────────────────────────────────────
                    // TAB 1: INFORMASI PRODUK
                    // ──────────────────────────────────────────────
                    Forms\Components\Tabs\Tab::make('📦 Informasi Produk')
                        ->schema([
                            Forms\Components\Section::make()
                                ->columns(2)
                                ->schema([

                                    // Kategori — trigger re-generate product_code
                                    Forms\Components\Select::make('product_category_id')
                                        ->label('Kategori Produk')
                                        ->options(
                                            ProductCategory::active()->pluck('name', 'id')
                                        )
                                        ->searchable()
                                        ->required()
                                        ->live()
                                        ->afterStateUpdated(function ($state, Get $get, Set $set) {
                                            $name = $get('name');
                                            if ($name && $state) {
                                                $cat = ProductCategory::find($state);
                                                if ($cat) {
                                                    $set('product_code', Product::generateProductCode($cat->slug, $name));
                                                }
                                            }
                                        }),

                                    // Kode produk — auto-generate, read-only
                                    Forms\Components\TextInput::make('product_code')
                                        ->label('Kode Produk')
                                        ->unique(Product::class, 'product_code', ignoreRecord: true)
                                        ->readOnly()
                                        ->placeholder('Otomatis dari nama & kategori...')
                                        ->helperText('Di-generate otomatis. Format: CAT-NAME-0000'),

                                    // Nama produk — trigger generate code + slug
                                    Forms\Components\TextInput::make('name')
                                        ->label('Nama Produk')
                                        ->required()
                                        ->maxLength(255)
                                        ->live(onBlur: true)
                                        ->afterStateUpdated(function ($state, Get $get, Set $set, $record) {
                                            // Auto-generate slug saat create baru
                                            if (! $record) {
                                                $set('slug', Product::uniqueSlug($state));
                                            }
                                            // Auto-generate product_code
                                            $catId = $get('product_category_id');
                                            if ($catId && $state) {
                                                $cat = ProductCategory::find($catId);
                                                if ($cat) {
                                                    $set('product_code', Product::generateProductCode($cat->slug, $state));
                                                }
                                            }
                                        })
                                        ->columnSpanFull(),

                                    // Slug — auto-generate, read-only
                                    Forms\Components\TextInput::make('slug')
                                        ->label('Slug URL')
                                        ->unique(Product::class, 'slug', ignoreRecord: true)
                                        ->readOnly()
                                        ->helperText('Auto-generate dari nama produk. Digunakan untuk URL.'),

                                    // Durasi
                                    Forms\Components\Select::make('duration_type')
                                        ->label('Durasi Program')
                                        ->options(DurationTypeEnum::options())
                                        ->required()
                                        ->live()
                                        ->afterStateUpdated(function ($state, Set $set) {
                                            $set('duration_unit', $state === 'lifetime' ? 'lifetime' : 'month');
                                        }),

                                    Forms\Components\TextInput::make('duration_unit')
                                        ->label('Satuan Durasi')
                                        ->readOnly()
                                        ->default('month')
                                        ->helperText('Otomatis dari pilihan durasi'),

                                    // Deskripsi singkat
                                    Forms\Components\Textarea::make('short_description')
                                        ->label('Deskripsi Singkat')
                                        ->rows(4)
                                        ->maxLength(1000)
                                        ->helperText('Digunakan untuk preview produk dan auto-generate Meta Ads.')
                                        ->columnSpanFull(),

                                    // Sort & status
                                    Forms\Components\TextInput::make('sort_order')
                                        ->label('Urutan Tampil')
                                        ->numeric()
                                        ->default(0)
                                        ->minValue(0),

                                    Forms\Components\Toggle::make('is_active')
                                        ->label('Produk Aktif')
                                        ->default(true)
                                        ->helperText('Produk nonaktif tidak tampil di halaman publik'),

                                ]),
                        ]),

                    // ──────────────────────────────────────────────
                    // TAB 2: HARGA & DISKON
                    // ──────────────────────────────────────────────
                    Forms\Components\Tabs\Tab::make('💰 Harga & Diskon')
                        ->schema([

                            // Harga dasar
                            Forms\Components\Section::make('Harga Dasar')
                                ->schema([
                                    Forms\Components\TextInput::make('base_price')
                                        ->label('Harga Dasar (Rp)')
                                        ->required()
                                        ->numeric()
                                        ->minValue(0)
                                        ->prefix('Rp')
                                        ->inputMode('numeric')
                                        ->live(debounce: 500)
                                        ->afterStateUpdated(function ($state, Get $get, Set $set) {
                                            static::recalcPreview($state, $get, $set);
                                        }),
                                ]),

                            // Diskon (opsional)
                            Forms\Components\Section::make('Pengaturan Diskon')
                                ->description('Opsional — aktifkan jika produk ini sedang masa promo.')
                                ->schema([

                                    Forms\Components\Toggle::make('has_discount')
                                        ->label('Aktifkan Diskon untuk Produk Ini')
                                        ->default(false)
                                        ->live()
                                        ->columnSpanFull()
                                        ->afterStateUpdated(function ($state, Get $get, Set $set) {
                                            static::recalcPreview($get('base_price'), $get, $set);
                                        }),

                                    // Field diskon — hanya tampil jika toggle aktif
                                    Forms\Components\Grid::make(2)
                                        ->visible(fn (Get $get) => (bool) $get('has_discount'))
                                        ->schema([

                                            Forms\Components\Select::make('discount_type')
                                                ->label('Jenis Diskon')
                                                ->options([
                                                    'percent' => '📊 Persentase (%)',
                                                    'fixed'   => '💵 Nominal Tetap (Rp)',
                                                ])
                                                ->default('percent')
                                                ->required()
                                                ->live()
                                                ->afterStateUpdated(function ($state, Get $get, Set $set) {
                                                    $set('discount_value', null);
                                                    static::recalcPreview($get('base_price'), $get, $set);
                                                }),

                                            Forms\Components\TextInput::make('discount_value')
                                                ->label(fn (Get $get) => $get('discount_type') === 'fixed'
                                                    ? 'Nilai Diskon (Rp)'
                                                    : 'Persentase Diskon (%)')
                                                ->numeric()
                                                ->required()
                                                ->minValue(0.01)
                                                ->maxValue(fn (Get $get) => $get('discount_type') === 'percent' ? 100 : null)
                                                ->suffix(fn (Get $get) => $get('discount_type') === 'percent' ? '%' : null)
                                                ->prefix(fn (Get $get) => $get('discount_type') === 'fixed' ? 'Rp' : null)
                                                ->live(debounce: 500)
                                                ->afterStateUpdated(function ($state, Get $get, Set $set) {
                                                    static::recalcPreview($get('base_price'), $get, $set);
                                                }),

                                            Forms\Components\DatePicker::make('discount_valid_from')
                                                ->label('Berlaku Mulai')
                                                ->native(false)
                                                ->displayFormat('d M Y')
                                                ->nullable(),

                                            Forms\Components\DatePicker::make('discount_valid_until')
                                                ->label('Berlaku Hingga')
                                                ->native(false)
                                                ->displayFormat('d M Y')
                                                ->nullable()
                                                ->afterOrEqual('discount_valid_from'),

                                            Forms\Components\Toggle::make('discount_is_active')
                                                ->label('Status Diskon Aktif')
                                                ->default(true)
                                                ->columnSpanFull(),
                                        ]),

                                    // ── PREVIEW HARGA FINAL ───────────────────
                                    Forms\Components\Placeholder::make('price_preview')
                                        ->label('Preview Harga Final')
                                        ->columnSpanFull()
                                        ->content(function (Get $get): HtmlString {
                                            $base  = (float) ($get('base_price') ?? 0);
                                            $type  = $get('discount_type') ?? 'percent';
                                            $value = (float) ($get('discount_value') ?? 0);
                                            $has   = (bool) $get('has_discount');

                                            $final = ($has && $value > 0)
                                                ? ProductDiscount::calcFinalPrice($base, $type, $value)
                                                : $base;

                                            $fmt = fn ($n) => 'Rp ' . number_format($n, 0, ',', '.');

                                            if ($has && $value > 0 && $base > 0) {
                                                $saving = $base - $final;
                                                $pct    = round(($saving / $base) * 100, 1);

                                                return new HtmlString(
                                                    '<div style="background:linear-gradient(135deg,#065f46,#064e3b);border:1px solid #059669;border-radius:12px;padding:20px 24px">'
                                                    . '<div style="display:flex;align-items:flex-start;justify-content:space-between;gap:16px">'
                                                    . '<div>'
                                                    . '<p style="font-size:.72rem;color:#6ee7b7;margin-bottom:4px;text-transform:uppercase;letter-spacing:.5px">Harga Normal</p>'
                                                    . '<p style="font-size:1.1rem;font-weight:600;color:#9ca3af;text-decoration:line-through">' . $fmt($base) . '</p>'
                                                    . '</div>'
                                                    . '<div style="text-align:right">'
                                                    . '<p style="font-size:.72rem;color:#6ee7b7;margin-bottom:4px;text-transform:uppercase;letter-spacing:.5px">Harga Setelah Diskon</p>'
                                                    . '<p style="font-size:1.8rem;font-weight:800;color:#34d399">' . $fmt($final) . '</p>'
                                                    . '</div>'
                                                    . '</div>'
                                                    . '<div style="margin-top:12px;padding-top:12px;border-top:1px solid #059669">'
                                                    . '<span style="background:#059669;color:#fff;font-size:.75rem;font-weight:700;padding:3px 10px;border-radius:99px">💰 Hemat ' . $fmt($saving) . ' (' . $pct . '%)</span>'
                                                    . '</div>'
                                                    . '</div>'
                                                );
                                            }

                                            // Tanpa diskon
                                            return new HtmlString(
                                                '<div style="background:#1f2937;border:1px solid #374151;border-radius:12px;padding:20px 24px">'
                                                . '<p style="font-size:.72rem;color:#9ca3af;margin-bottom:6px;text-transform:uppercase;letter-spacing:.5px">Harga Jual</p>'
                                                . '<p style="font-size:1.8rem;font-weight:800;color:#f9fafb">' . ($base > 0 ? $fmt($base) : '—') . '</p>'
                                                . '<p style="margin-top:8px;font-size:.75rem;color:#6b7280">Tidak ada diskon aktif</p>'
                                                . '</div>'
                                            );
                                        }),
                                ]),
                        ]),

                    // ──────────────────────────────────────────────
                    // TAB 3: BENEFIT
                    // ──────────────────────────────────────────────
                    Forms\Components\Tabs\Tab::make('✅ Benefit')
                        ->schema([
                            Forms\Components\Section::make()
                                ->description('Pilih benefit dari master data yang berlaku untuk produk ini. Benefit baru dapat ditambahkan di menu Master Data → Master Benefit.')
                                ->schema([
                                    Forms\Components\CheckboxList::make('benefits')
                                        ->label('Pilih Benefit Produk')
                                        ->relationship(
                                            'benefits',
                                            'label',
                                            fn ($query) => $query
                                                ->where('benefit_masters.is_active', true)  // ← Specify table name
                                                ->orderBy('benefit_masters.sort_order')     // ← Specify table name
                                        )
                                        ->bulkToggleable()
                                        ->columns(2)
                                        ->gridDirection('row')
                                        ->noSearchResultsMessage('Benefit tidak ditemukan.')
                                        ->helperText('Centang semua benefit yang didapatkan di produk ini.'),
                                ]),
                        ]),

                    // ──────────────────────────────────────────────
                    // TAB 4: META ADS
                    // ──────────────────────────────────────────────
                    Forms\Components\Tabs\Tab::make('📣 Meta Ads')
                        ->schema([
                            Forms\Components\Section::make('Konten Iklan Meta / Facebook Ads')
                                ->description('Konten iklan di-generate otomatis dari data produk. Anda dapat mengedit secara manual sebelum disetujui.')
                                ->schema([

                                    // Tombol generate ulang
                                    Forms\Components\Actions::make([
                                        Forms\Components\Actions\Action::make('regenerate_meta')
                                            ->label('⚡ Generate Ulang dari Data Produk')
                                            ->color('warning')
                                            ->outlined()
                                            ->requiresConfirmation()
                                            ->modalHeading('Generate Ulang Meta Ads?')
                                            ->modalDescription('Konten Meta Ads yang sudah ada akan ditimpa dengan hasil generate baru dari data produk saat ini.')
                                            ->action(function (Get $get, Set $set, $record) {
                                                if (! $record) {
                                                    Notification::make()
                                                        ->warning()
                                                        ->title('Simpan produk dahulu')
                                                        ->body('Harap simpan data produk sebelum men-generate Meta Ads.')
                                                        ->send();
                                                    return;
                                                }

                                                $record->load(['benefits', 'discount', 'productCategory']);
                                                $data = $record->generateMetaAdsData();

                                                $set('meta_headline', $data['headline']);
                                                $set('meta_primary_text', $data['primary_text']);
                                                $set('meta_description', $data['description']);
                                                $set('meta_call_to_action', $data['call_to_action']);
                                                $set('meta_is_approved', false);

                                                Notification::make()
                                                    ->success()
                                                    ->title('Meta Ads berhasil di-generate!')
                                                    ->body('Silakan review konten sebelum menandainya sebagai Disetujui.')
                                                    ->send();
                                            }),
                                    ])->columnSpanFull(),

                                    Forms\Components\TextInput::make('meta_headline')
                                        ->label('Headline')
                                        ->maxLength(255)
                                        ->placeholder('Nama Produk | Durasi | Harga')
                                        ->helperText('Judul utama iklan (maks. 255 karakter)')
                                        ->columnSpanFull(),

                                    Forms\Components\Textarea::make('meta_primary_text')
                                        ->label('Primary Text')
                                        ->rows(10)
                                        ->placeholder('Teks utama yang muncul di feed iklan...')
                                        ->helperText('Teks utama iklan yang tampil di news feed.')
                                        ->columnSpanFull(),

                                    Forms\Components\Textarea::make('meta_description')
                                        ->label('Description')
                                        ->rows(3)
                                        ->placeholder('Ringkasan singkat + call to action...')
                                        ->helperText('Deskripsi pendek di bawah gambar/link.')
                                        ->columnSpanFull(),

                                    Forms\Components\TextInput::make('meta_call_to_action')
                                        ->label('Call to Action')
                                        ->default('Beli Sekarang Sekarang')
                                        ->maxLength(100),

                                    Forms\Components\TextInput::make('meta_target_url')
                                        ->label('Target URL')
                                        ->url()
                                        ->maxLength(500)
                                        ->placeholder('https://...')
                                        ->helperText('URL landing page produk ini'),

                                    Forms\Components\Toggle::make('meta_is_approved')
                                        ->label('✅ Meta Ads Sudah Disetujui & Siap Digunakan')
                                        ->default(false)
                                        ->helperText('Tandai setelah konten iklan sudah direviu.'),

                                ]),
                        ]),

                ]),
        ]);
    }
    // ══════════════════════════════════════════════════════════════
    // TABLE
    // ══════════════════════════════════════════════════════════════
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('sort_order')
                    ->label('#')
                    ->sortable()
                    ->width(50),

                Tables\Columns\TextColumn::make('product_code')
                    ->label('Kode')
                    ->searchable()
                    ->copyable()
                    ->badge()
                    ->color('gray')
                    ->fontFamily('mono'),

                Tables\Columns\TextColumn::make('name')
                    ->label('Nama Produk')
                    ->searchable()
                    ->sortable()
                    ->description(fn ($record) => $record->productCategory?->name ?? '—')
                    ->wrap(),

                Tables\Columns\TextColumn::make('base_price')
                    ->label('Harga Dasar')
                    ->money('IDR')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('discount.final_price')
                    ->label('Harga Final')
                    ->money('IDR')
                    ->placeholder('—')
                    ->color('success')
                    ->sortable(),

                Tables\Columns\TextColumn::make('duration_type')
                    ->label('Durasi')
                    ->badge()
                    ->color('info')
                    ->formatStateUsing(fn ($state) => $state instanceof DurationTypeEnum
                        ? $state->label()
                        : ($state === 'lifetime' ? 'Lifetime' : $state . ' Bulan')
                    ),

                Tables\Columns\IconColumn::make('discount.is_active')
                    ->label('Diskon')
                    ->boolean()
                    ->placeholder('—'),

                Tables\Columns\IconColumn::make('metaAd.is_approved')
                    ->label('Meta Ads')
                    ->boolean()
                    ->placeholder('—'),

                Tables\Columns\IconColumn::make('is_active')
                    ->label('Aktif')
                    ->boolean(),

                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Diperbarui')
                    ->dateTime('d M Y')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('sort_order')
            ->reorderable('sort_order')
            ->filters([
                Tables\Filters\SelectFilter::make('product_category_id')
                    ->label('Kategori')
                    ->relationship('productCategory', 'name')
                    ->searchable()
                    ->preload(),

                Tables\Filters\SelectFilter::make('duration_type')
                    ->label('Durasi')
                    ->options(DurationTypeEnum::options()),

                Tables\Filters\TernaryFilter::make('is_active')
                    ->label('Status Aktif'),

                Tables\Filters\TernaryFilter::make('has_discount')
                    ->label('Memiliki Diskon')
                    ->queries(
                        true:  fn (Builder $q) => $q->whereHas('discount', fn ($d) => $d->where('is_active', true)),
                        false: fn (Builder $q) => $q->whereDoesntHave('discount'),
                    ),

                Tables\Filters\TernaryFilter::make('meta_approved')
                    ->label('Meta Ads Disetujui')
                    ->queries(
                        true:  fn (Builder $q) => $q->whereHas('metaAd', fn ($m) => $m->where('is_approved', true)),
                        false: fn (Builder $q) => $q->whereDoesntHave('metaAd'),
                    ),

                Tables\Filters\TrashedFilter::make(),
            ])
            ->filtersLayout(Tables\Enums\FiltersLayout::AboveContent)
            ->actions([
                Tables\Actions\EditAction::make(),

                Tables\Actions\Action::make('duplicate')
                    ->label('Duplikat')
                    ->icon('heroicon-o-document-duplicate')
                    ->color('gray')
                    ->requiresConfirmation()
                    ->action(function ($record) {
                        $new = $record->replicate(['product_code', 'slug', 'deleted_at']);
                        $new->name         = $record->name . ' (Copy)';
                        $new->slug         = Product::uniqueSlug($new->name);
                        $new->product_code = Product::generateProductCode(
                            $record->productCategory->slug,
                            $new->name
                        );
                        $new->is_active = false;
                        $new->save();

                        Notification::make()
                            ->success()
                            ->title('Produk berhasil diduplikat!')
                            ->body("Produk \"{$new->name}\" dibuat dengan status nonaktif.")
                            ->send();
                    }),

                Tables\Actions\DeleteAction::make(),
                Tables\Actions\RestoreAction::make(),
                Tables\Actions\ForceDeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\RestoreBulkAction::make(),
                    Tables\Actions\BulkAction::make('activate')
                        ->label('Aktifkan')
                        ->icon('heroicon-o-check-circle')
                        ->color('success')
                        ->action(fn ($records) => $records->each(fn ($r) => $r->update(['is_active' => true]))),
                    Tables\Actions\BulkAction::make('deactivate')
                        ->label('Nonaktifkan')
                        ->icon('heroicon-o-x-circle')
                        ->color('danger')
                        ->action(fn ($records) => $records->each(fn ($r) => $r->update(['is_active' => false]))),
                ]),
            ]);
    }
    // ══════════════════════════════════════════════════════════════
    // HELPER: RECALC PRICE PREVIEW
    // ══════════════════════════════════════════════════════════════

    protected static function recalcPreview(mixed $basePrice, Get $get, Set $set): void
    {
        $base  = (float) ($basePrice ?? 0);
        $type  = $get('discount_type') ?? 'percent';
        $value = (float) ($get('discount_value') ?? 0);
        $has   = (bool) $get('has_discount');

        $final = ($has && $value > 0)
            ? ProductDiscount::calcFinalPrice($base, $type, $value)
            : $base;

        $set('final_price_calculated', $final);
    }

    // ══════════════════════════════════════════════════════════════
    // ELOQUENT QUERY — include trashed
    // ══════════════════════════════════════════════════════════════

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->withTrashed();
    }

    // ══════════════════════════════════════════════════════════════
    // PAGES
    // ══════════════════════════════════════════════════════════════

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }
}
