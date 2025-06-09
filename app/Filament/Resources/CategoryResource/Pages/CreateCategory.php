<?php

namespace App\Filament\Resources\CategoryResource\Pages;

use App\Filament\Resources\CategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Filament\Notifications\Notification;

class CreateCategory extends CreateRecord
{
    protected static string $resource = CategoryResource::class;

    protected function getCreatedNotification(): ?Notification
    {
        return Notification::make()
            ->title('Categoría guardada exitosamente')
            ->body('La categoría ha sido agregada a la base de datos.')
            ->success();
    }

    protected function getRedirectUrl(): string
    {
        return CategoryResource::getUrl('index');
    }
}
