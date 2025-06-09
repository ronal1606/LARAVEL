<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;
use App\Models\Productos;

class Categorias extends Component
{
    public function agregarAlCarrito($productoId)
    {
        $producto = Productos::find($productoId);
        $cart = session()->get('cart', []);
        if(isset($cart[$productoId])) {
            $cart[$productoId]['cantidad'] += 1;
        } else {
            $cart[$productoId] = [
                'id' => $producto->id,
                'nombre' => $producto->nombre,
                'precio' => $producto->precio,
                'imagen' => $producto->imagen,
                'cantidad' => 1,
            ];
        }
        session(['cart' => $cart]);
        $this->dispatch('cartUpdated');
    }

    public function render()
    {
        $categorias = Category::with('products')->get();
        return view('livewire.categorias', compact('categorias'));
    }
}
