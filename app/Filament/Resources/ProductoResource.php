<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductoResource\Pages;
use App\Filament\Resources\ProductoResource\RelationManagers;
use App\Models\Producto;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProductoResource extends Resource
{
    protected static ?string $model = \App\Models\Productos::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nombre')
                    ->label('Nombre')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('descripcion')
                    ->label('Descripción')
                    ->rows(2),
                Forms\Components\TextInput::make('precio')
                    ->label('Precio')
                    ->numeric()
                    ->required()
                    ->prefix('COP $'),
                Forms\Components\Select::make('categoria_id')
                    ->label('Categoría')
                    ->relationship('categoria', 'name')
                    ->required(),
                Forms\Components\FileUpload::make('imagen')
                    ->label('Imagen')
                    ->image()
                    ->directory('productos')
                    ->disk('public')
                    ->getUploadedFileNameForStorageUsing(function ($file, $record) {
                        $nombre = $record?->nombre ?? pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
                        $nombre = preg_replace('/[^A-Za-z0-9_\-]/', '_', $nombre);
                        $unique = uniqid();
                        $ext = $file->getClientOriginalExtension();
                        return "{$nombre}-{$unique}.{$ext}";
                    }),
            ])
            ->columns(2); // <-- Esto hace que todo el formulario sea de dos columnas
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nombre')->label('Nombre')->searchable(),
                Tables\Columns\ImageColumn::make('imagen')->label('Imagen')->disk('public'),
                Tables\Columns\TextColumn::make('descripcion')->label('Descripción')->limit(30),
                Tables\Columns\TextColumn::make('precio')->label('Precio')->money('COP', true),
                Tables\Columns\TextColumn::make('categoria.name')->label('Categoría'),
                Tables\Columns\TextColumn::make('created_at')->label('Creado en')->dateTime()->sortable()->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')->label('Actualizado en')->dateTime()->sortable()->toggleable(isToggledHiddenByDefault: true),
            ])
            ->actions([
                Tables\Actions\EditAction::make()->label('Editar'),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make()->label('Eliminar'),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProductos::route('/'),
            'create' => Pages\CreateProducto::route('/create'),
            'edit' => Pages\EditProducto::route('/{record}/edit'),
        ];
    }
}
