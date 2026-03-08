<?php

namespace App\Filament\Resources\BenefitMasterResource\Pages;

use App\Filament\Resources\BenefitMasterResource;
//use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateBenefitMaster extends CreateRecord
{
    protected static string $resource = BenefitMasterResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
