<?php

namespace App\Filament\Resources\AdminResource\Pages;

use App\Filament\Resources\AdminResource;
use App\Models\User;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\Auth;

class EditAdmin extends EditRecord
{
    protected static string $resource = AdminResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make()
                ->before(function (User $record) {
                    if ($record->getKey() === Auth::id()) {
                        \Filament\Notifications\Notification::make()
                            ->danger()
                            ->title('Tidak bisa menghapus akun sendiri!')
                            ->body('Anda sedang login dengan akun ini.')
                            ->send();
                        $this->halt();
                    }
                }),
        ];
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $data['role'] = 'admin';

        return $data;
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
