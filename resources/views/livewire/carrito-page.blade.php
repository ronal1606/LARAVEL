{{-- filepath: resources/views/livewire/carrito-page.blade.php --}}
<div class="container mx-auto py-8 flex flex-col md:flex-row gap-8 items-start">
    <!-- Columna izquierda: Formulario -->
    <div class="w-full md:w-2/3 bg-white/30 backdrop-blur-md rounded-lg p-8 text-black shadow-lg">
        <h2 class="text-xl font-semibold mb-4">Información de Facturación</h2>
        <form wire:submit.prevent="ordenar">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                <div>
                    <label class="block text-sm font-medium mb-1">Nombre</label>
                    <input type="text" class="w-full border rounded px-3 py-2 bg-white text-black" placeholder="Tu nombre" wire:model.defer="nombre">
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1">Apellido</label>
                    <input type="text" class="w-full border rounded px-3 py-2 bg-white text-black" placeholder="Tu Apellido" wire:model.defer="apellido">
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1">Nombre de la empresa (opcional)</label>
                    <input type="text" class="w-full border rounded px-3 py-2 bg-white text-black" placeholder="Nombre de la empresa" wire:model.defer="empresa">
                </div>
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium mb-1">Correo</label>
                <input type="email" class="w-full border rounded px-3 py-2 bg-white text-black" placeholder="Correo" wire:model.defer="correo">
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                <div>
                    <label class="block text-sm font-medium mb-1">País / Región</label>
                    <select class="w-full border rounded px-3 py-2 bg-white text-black" wire:model.defer="pais">
                        <option value="">Seleccionar</option>
                        <option value="Colombia">Colombia</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1">Ciudad</label>
                    <input type="text" class="w-full border rounded px-3 py-2 bg-white text-black" placeholder="Ciudad" wire:model.defer="ciudad">
                </div>
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium mb-1">Celular</label>
                <input type="text" class="w-full border rounded px-3 py-2 bg-white text-black" placeholder="Número de Celular" wire:model.defer="celular">
            </div>
            <hr class="my-6 border-black/30">
            <h3 class="text-lg font-semibold mb-2">Información Adicional</h3>
            <div class="mb-4">
                <label class="block text-sm font-medium mb-1">Notas de Pedido (Opcional)</label>
                <textarea class="w-full border rounded px-3 py-2 bg-white text-black" rows="3" placeholder="Notas sobre su pedido, por ejemplo, notas especiales para la entrega" wire:model.defer="notas"></textarea>
            </div>
        </form>
    </div>

    <!-- Columna derecha: Orden -->
    <div class="w-full md:w-1/3 bg-white/30 backdrop-blur-md rounded-lg p-8 text-black shadow-lg">
        <h2 class="text-xl font-semibold mb-4">Orden</h2>
        @forelse($cart as $id => $item)
            <div class="flex items-center justify-between mb-4 border-b pb-2">
                <!-- Imagen y nombre -->
                <div class="flex items-center gap-3 w-1/3">
                    <img src="{{ $item['imagen'] ? asset('storage/' . $item['imagen']) : 'https://via.placeholder.com/40' }}" alt="{{ $item['nombre'] }}" class="w-16 h-16 rounded object-cover">
                    <div class="font-semibold">{{ $item['nombre'] }}</div>
                </div>
                <!-- Controles de cantidad centrados -->
                <div class="flex items-center justify-center w-1/3">
                    <button wire:click="disminuirCantidad({{ $id }})" class="w-8 h-8 flex items-center justify-center rounded-full bg-gray-200 hover:bg-red-200 text-lg font-bold transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-width="2" d="M20 12H4" /></svg>
                    </button>
                    <span class="mx-3 text-base font-medium">{{ $item['cantidad'] }}</span>
                    <button wire:click="aumentarCantidad({{ $id }})" class="w-8 h-8 flex items-center justify-center rounded-full bg-gray-200 hover:bg-green-200 text-lg font-bold transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-width="2" d="M12 4v16m8-8H4" /></svg>
                    </button>
                </div>
                <!-- Precio y papelera -->
                <div class="flex flex-col items-end w-1/3">
                    <span class="font-semibold text-green-700">${{ number_format($item['precio'] * $item['cantidad'], 0, ',', '.') }}</span>
                    <button wire:click="eliminarProducto({{ $id }})" class="mt-2 text-red-500 hover:text-red-700 transition" title="Eliminar">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0 1 16.138 21H7.862a2 2 0 0 1-1.995-1.858L5 7m5 4v6m4-6v6M1 7h22M8 7V5a2 2 0 0 1 2-2h2a2 2 0 0 1 2 2v2" />
                        </svg>
                    </button>
                </div>
            </div>
        @empty
            <p class="text-gray-700">No hay productos en el carrito.</p>
        @endforelse

        <hr class="my-4 border-gray-300">

        <div class="flex justify-between text-base mb-1">
            <span>Envío:</span>
            <span class="font-semibold text-green-700">Free</span>
        </div>
        <div class="flex justify-between items-center text-lg font-bold mb-2">
            <span>Total:</span>
            <span>${{ number_format($subtotal, 0, ',', '.') }}</span>
        </div>

        <div class="mt-6">
            <label class="font-semibold mb-2 block">Método de Pago</label>
            <div>
                <input type="radio" checked disabled> ContraEntrega
            </div>
        </div>

        <button class="mt-6 w-full bg-green-500 hover:bg-green-600 text-white font-bold py-2 rounded-full transition">
            Ordenar
        </button>
    </div>
</div>
