{{-- resources/views/livewire/carrito-icon.blade.php --}}
<a href="{{ route('carrito') }}" class="relative mx-4 text-green-400 hover:text-green-600 transition" title="Carrito">
    <i class="fas fa-shopping-cart text-2xl"></i>
    @if($cart_count > 0)
        <span class="absolute -top-2 -right-2 bg-yellow-400 text-black rounded-full text-xs px-2 py-0.5 font-bold">
            {{ $cart_count }}
        </span>
    @endif
</a>
