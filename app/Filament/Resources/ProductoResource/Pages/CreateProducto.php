<?php

namespace App\Filament\Resources\ProductoResource\Pages;

use App\Filament\Resources\ProductoResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Filament\Notifications\Notification;

class CreateProducto extends CreateRecord
{
    protected static string $resource = ProductoResource::class;

    protected function getCreatedNotification(): ?Notification
    {
        return Notification::make()
            ->title('Producto creado exitosamente')
            ->body('El producto ha sido agregado correctamente.')
            ->success();
    }

    protected function getRedirectUrl(): string
    {
        return ProductoResource::getUrl('index');
    }
}
