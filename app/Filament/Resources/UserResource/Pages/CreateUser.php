<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Resources\Pages\CreateRecord;
use Filament\Notifications\Notification;

class CreateUser extends CreateRecord
{
    protected static string $resource = UserResource::class;

    protected function getCreatedNotification(): ?Notification
    {
        return Notification::make()
            ->title('Usuario guardado exitosamente')
            ->body('El usuario ha sido agregado a la base de datos.')
            ->success();
    }

    protected function getRedirectUrl(): string
    {
        return UserResource::getUrl('index');
    }
}
