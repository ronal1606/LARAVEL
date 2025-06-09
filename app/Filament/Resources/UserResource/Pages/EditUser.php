<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Filament\Notifications\Notification;

class EditUser extends EditRecord
{
    protected static string $resource = UserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    // Quitar la notificación predeterminada de "saved"
    protected function getSavedNotification(): ?Notification
    {
        return null;
    }

    protected function afterSave(): void
    {
        Notification::make()
            ->title('Usuario actualizado exitosamente')
            ->body('El usuario ha sido actualizado en la base de datos.')
            ->success()
            ->send();

        $this->redirect(UserResource::getUrl('index'));
    }

    protected function afterDelete(): void
    {
        Notification::make()
            ->title('Usuario eliminado exitosamente')
            ->body('El usuario ha sido eliminado de la base de datos.')
            ->success()
            ->send();
    }

    protected function getDeletedNotification(): ?Notification
    {
        return null;
    }
}
