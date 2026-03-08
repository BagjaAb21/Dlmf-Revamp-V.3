<?php

namespace App\Filament\Resources\BenefitMasterResource\Pages;

use App\Filament\Resources\BenefitMasterResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBenefitMasters extends ListRecords
{
    protected static string $resource = BenefitMasterResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label('Tambah Benefit Baru')
        ];
    }
}
