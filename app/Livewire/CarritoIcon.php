<?php

namespace App\Livewire;

use Livewire\Component;

class CarritoIcon extends Component
{
    public $cart_count = 0;

    protected $listeners = ['cartUpdated' => 'updateCartCount'];

    public function mount()
    {
        $cart = session('cart', []);
        $this->cart_count = collect($cart)->sum('cantidad');
    }

    public function updateCartCount()
    {
        $cart = session('cart', []);
        $this->cart_count = collect($cart)->sum('cantidad');
    }

    public function render()
    {
        return view('livewire.carrito-icon');
    }
}
