<?php

namespace App\Filament\Resources\CategoryResource\Pages;

use App\Filament\Resources\CategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Filament\Notifications\Notification;

class EditCategory extends EditRecord
{
    protected static string $resource = CategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function getSavedNotification(): ?Notification
    {
        return null;
    }

    protected function afterSave(): void
    {
        Notification::make()
            ->title('Categoría actualizada exitosamente')
            ->body('La categoría ha sido actualizada en la base de datos.')
            ->success()
            ->send();

        $this->redirect(CategoryResource::getUrl('index'));
    }

    protected function afterDelete(): void
    {
        Notification::make()
            ->title('Categoría eliminada exitosamente')
            ->body('La categoría ha sido eliminada de la base de datos.')
            ->success()
            ->send();
    }

    protected function getDeletedNotification(): ?Notification
    {
        return null;
    }
}
