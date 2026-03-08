<?php

namespace App\Filament\Resources\ProductResource\Pages;

use App\Filament\Resources\ProductResource;
use App\Filament\Resources\ProductResource\Concerns\HandlesProductRelations;
//use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateProduct extends CreateRecord
{
    use HandlesProductRelations;

    protected static string $resource = ProductResource::class;
    // ── 1. Ekstrak field relasi sebelum data produk disimpan ──────
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        return $this->extractRelationsFromData($data);
    }

    // ── 2. Setelah produk tersimpan, simpan relasi ────────────────

    protected function afterCreate(): void
    {
        $record = $this->getRecord();
        $this->saveDiscount($record);
        $this->saveMetaAds($record);
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
