<?php

namespace App\Livewire;

use Livewire\Component;

class CarritoPage extends Component
{
    public $cart = [];

    public function mount()
    {
        $this->cart = session('cart', []);
    }

    public function render()
    {
        $cart = session('cart', []);
        $subtotal = collect($cart)->sum(function($item) {
            return ($item['precio'] ?? 0) * ($item['cantidad'] ?? 1);
        });

        return view('livewire.carrito-page', [
            'cart' => $cart,
            'subtotal' => $subtotal,
        ]);
    }

    public function aumentarCantidad($id)
    {
        $cart = session('cart', []);
        if(isset($cart[$id])) {
            $cart[$id]['cantidad']++;
            session(['cart' => $cart]);
        }
        $this->cart = $cart;
    }

    public function disminuirCantidad($id)
    {
        $cart = session('cart', []);
        if(isset($cart[$id]) && $cart[$id]['cantidad'] > 1) {
            $cart[$id]['cantidad']--;
            session(['cart' => $cart]);
        }
        $this->cart = $cart;
    }

    public function eliminarProducto($id)
    {
        $cart = session('cart', []);
        unset($cart[$id]);
        session(['cart' => $cart]);
        $this->cart = $cart;
    }
}
