<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
    protected $table = 'productos';

    protected $fillable = [
        'nombre',
        'descripcion',
        'precio',
        'categoria_id',
        'imagen',
    ];

    // Relación con Categoría
    public function categoria()
    {
        return $this->belongsTo(\App\Models\Category::class, 'categoria_id');
    }
}
