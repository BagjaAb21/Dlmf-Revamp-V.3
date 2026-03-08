<?php

namespace App\Filament\Resources\ProductResource\Pages;

use App\Filament\Resources\ProductResource;
use App\Filament\Resources\ProductResource\Concerns\HandlesProductRelations;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProduct extends EditRecord
{
    use HandlesProductRelations;
    protected static string $resource = ProductResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\RestoreAction::make(),
            Actions\ForceDeleteAction::make(),
        ];
    }

    // ── 1. Populate form dengan data relasi saat halaman edit dibuka ──

    protected function mutateFormDataBeforeFill(array $data): array
    {
        return $this->populateRelationFields($data, $this->getRecord());
    }

    // ── 2. Ekstrak field relasi sebelum data produk di-update ────────

    protected function mutateFormDataBeforeSave(array $data): array
    {
        return $this->extractRelationsFromData($data);
    }

    // ── 3. Setelah produk di-update, simpan/update relasi ───────────

    protected function afterSave(): void
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
