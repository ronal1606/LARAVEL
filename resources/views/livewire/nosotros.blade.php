<?php

use Livewire\Volt\Component;

new class extends Component {
    //
}; ?>

<div class="min-h-screen flex flex-col items-center py-10 px-4">
    <div class="w-full max-w-7xl flex flex-col gap-12">
        <!-- Sección superior: Título, subtítulo y foto circular a la derecha -->
        <div class="flex flex-col md:flex-row md:items-center gap-8">
            <div class="flex-1 flex flex-col justify-center">
                <h1 class="text-8xl font-semibold text-white mb-2 whitespace-nowrap leading-tight">Sobre Nosotros
                </h1>
                <p class="text-lg text-green-100 mb-6">La agricultura es la base sobre la cual el mundo esta basado</p>
                <a href="#vision"
                   class="mt-12 ml-12 text-3xl bg-green-700 hover:bg-green-800 text-white font-bold py-5 px-16 rounded-2xl shadow-lg transition mb-4 w-max">
                    Nuestra Visión
                </a>
            </div>
            <div class="flex-shrink-0 flex justify-center">
                <img src="{{ asset('images/nosotros1.png') }}"
                    alt="Insumos agrícolas"
                    class="w-80 h-80 object-cover rounded-full border-4 border-white shadow-lg">
            </div>
        </div>
        <!-- Sección inferior: Imagen rectangular y párrafo largo -->
        <div class="flex flex-col md:flex-row md:items-start gap-8">
            <div class="flex-shrink-0 flex justify-center">
                <img src="{{ asset('images/nosotros2.jpg') }}"
                    alt="Campo agrícola"
                    class="w-[500px] h-[320px] object-cover rounded-xl shadow-lg">
            </div>
            <div class="flex-1 flex flex-col justify-center">
                <p class="text-white text-2xl text-left pl-4 w-full">
                    Nuestra visión es ser un proveedor líder de productos agrícolas, reconocido por nuestro compromiso con la
                    calidad, la sostenibilidad y la satisfacción del cliente. Nuestro objetivo es impulsar la innovación en
                    el sector agrícola, contribuyendo a un mundo donde la agricultura sea eficiente, sostenible y
                    próspera para todos.
                </p>
            </div>
        </div>
    </div>
</div>
