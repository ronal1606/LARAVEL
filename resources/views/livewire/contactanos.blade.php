<?php

use Livewire\Volt\Component;

new class extends Component {
    //
}; ?>

{{-- filepath: resources/views/livewire/contactanos.blade.php --}}
<div class="min-h-screen flex flex-col justify-between">
    <div class="max-w-6xl mx-auto w-full flex flex-col md:flex-row mt-4 p-8">
        <!-- Izquierda: Título, texto y productos -->
        <div class="w-full md:w-1/2 flex flex-col justify-center">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">
                ¡Pongámonos en <span class="text-green-600">Contacto!</span>
            </h1>
            <p class="mb-2 text-base md:text-lg text-black font-bold">
                ¿Tiene alguna pregunta o necesita ayuda? Comuníquese con nosotros por correo electrónico, teléfono, o el formulario de contacto a continuación. Estamos ansiosos por ayudarte.
            </p>
            <p class="text-green-700 font-semibold mb-4">¡Buena audiencia de usted!</p>
            <div class="flex items-end justify-start mt-6">
                <img src="{{ asset('images/Contatanos1.png') }}" alt="Productos" class="w-48 md:w-64">
            </div>
        </div>
        <!-- Derecha: Formulario alineado arriba -->
        <div class="w-full md:w-1/2 flex flex-col items-start justify-start">
            <form class="p-4 flex flex-col gap-6 w-full">
                <div>
                    <label class="block text-base md:text-lg font-semibold mb-1">Nombre:</label>
                    <input type="text" class="w-full border border-green-300 rounded-full px-4 py-3 text-lg focus:outline-none focus:ring-2 focus:ring-green-400" placeholder="Tu nombre">
                </div>
                <div>
                    <label class="block text-base md:text-lg font-semibold mb-1">Correo:</label>
                    <input type="email" class="w-full border border-green-300 rounded-full px-4 py-3 text-lg focus:outline-none focus:ring-2 focus:ring-green-400" placeholder="Tu correo">
                </div>
                <div>
                    <label class="block text-base md:text-lg font-semibold mb-1">Mensaje:</label>
                    <textarea class="w-full border border-green-300 rounded-2xl px-4 py-3 text-lg focus:outline-none focus:ring-2 focus:ring-green-400" rows="4" placeholder="Escribe tu mensaje"></textarea>
                </div>
                <div class="flex justify-end">
                    <button type="submit" class="bg-green-600 hover:bg-green-700 text-white font-semibold px-10 py-3 rounded-full text-lg transition">Enviar</button>
                </div>
            </form>
        </div>
    </div>
    <!-- Contactos abajo -->
    <div class="max-w-6xl mx-auto w-full flex flex-col md:flex-row justify-between items-end mt-4 pb-8">
        <div class="flex gap-4 mb-4 md:mb-0">
            <a href="https://wa.me/573116372976?text=Hola%2C%20quiero%20m%C3%A1s%20informaci%C3%B3n%20acerca%20de%20sus%20productos%20y%20sus%20servicios" target="_blank" rel="noopener" class="text-green-700 text-6xl hover:text-green-800 transition">
                <i class="fab fa-whatsapp"></i>
            </a>
            <a href="https://www.facebook.com/share/1CiYAVQiyq/" target="_blank" rel="noopener" class="text-green-700 text-6xl hover:text-green-800 transition">
                <i class="fab fa-facebook-messenger"></i>
            </a>
            <a href="https://t.me/diamanteagro" target="_blank" rel="noopener" class="text-green-700 text-6xl hover:text-green-800 transition">
                <i class="fab fa-telegram"></i>
            </a>
        </div>
        <div class="flex flex-col md:flex-row gap-12 text-black text-base">
            <div>
                <div class="font-bold text-xl mb-1">Oficina Principal:</div>
                <div class="flex items-center gap-2 font-bold text-lg"><span>📞</span> +57 3116979265</div>
                <div class="flex items-center gap-2 font-bold text-lg"><span>✉️</span> diamanteagro@gmail.com</div>
                <div class="flex items-center gap-2 font-bold text-lg"><span>📍</span> pamplona</div>
            </div>
            <div>
                <div class="font-bold text-xl mb-1">Sucursal:</div>
                <div class="flex items-center gap-2 font-bold text-lg"><span>📞</span> +57 3188729711</div>
                <div class="flex items-center gap-2 font-bold text-lg"><span>✉️</span> diamanteagro@gmail.com</div>
                <div class="flex items-center gap-2 font-bold text-lg"><span>📍</span> Pamplona</div>
            </div>
        </div>
    </div>
</div>
