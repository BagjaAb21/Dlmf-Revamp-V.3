<?php

namespace App\Filament\Resources\BenefitMasterResource\Pages;

use App\Filament\Resources\BenefitMasterResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBenefitMaster extends EditRecord
{
    protected static string $resource = BenefitMasterResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
