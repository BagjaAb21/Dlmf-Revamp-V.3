<?php

namespace App\Filament\Resources\ProductResource\Pages;

use App\Filament\Resources\ProductResource;
use Filament\Actions;
use Filament\Resources\Components\Tab;
use Filament\Resources\Pages\ListRecords;
//use Illuminate\Database\Eloquent\Builder;

class ListProducts extends ListRecords
{
    protected static string $resource = ProductResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label('Tambah Produk Baru'),
        ];
    }

    // Tab filter berdasarkan status aktif / soft-deleted
    public function getTabs(): array
    {
        return [
            'all' => Tab::make('Semua'),

            'active' => Tab::make('Aktif')
                ->modifyQueryUsing(fn ($query) => $query->where('is_active', true)->withoutTrashed())
                ->badge(fn () => \App\Models\Product::where('is_active', true)->count()),

            'inactive' => Tab::make('Nonaktif')
                ->modifyQueryUsing(fn ($query) => $query->where('is_active', false)->withoutTrashed()),

            'trashed' => Tab::make('Dihapus')
                ->modifyQueryUsing(fn ($query) => $query->onlyTrashed()),
        ];
    }
}
