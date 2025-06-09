<?php

use Livewire\Volt\Component;

new class extends Component {
    //
}; ?>

<div class="min-h-screen flex flex-col items-center py-10 px-4 ">
    <div class="w-full max-w-7xl">
        <h1 class="text-6xl font-bold text-black mb-8 text-center">Nuestros Servicios</h1>
        <p class="text-lg text-white mb-12 text-center">
            Ofrecemos una amplia variedad de productos y servicios para el sector agropecuario, brindando calidad, asesoría y soluciones para el crecimiento de tu campo.
        </p>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
            <!-- Servicio 1 -->
            <div class="bg-white rounded-xl shadow-lg p-8 flex flex-col items-center">
                <img src="{{ asset('images/insumos.png') }}" alt="Insumos Agrícolas" class="w-24 h-24 mb-4">
                <h2 class="text-2xl font-semibold text-green-800 mb-2">Insumos Agrícolas</h2>
                <p class="text-green-700 text-center">Fertilizantes, semillas, pesticidas y todo lo necesario para el desarrollo de tus cultivos.</p>
            </div>
            <!-- Servicio 2 -->
            <div class="bg-white rounded-xl shadow-lg p-8 flex flex-col items-center">
                <img src="{{ asset('images/herramientas.png') }}" alt="Herramientas" class="w-24 h-24 mb-4">
                <h2 class="text-2xl font-semibold text-green-800 mb-2">Herramientas y Equipos</h2>
                <p class="text-green-700 text-center">Venta de herramientas manuales, maquinaria agrícola y equipos de última tecnología.</p>
            </div>
            <!-- Servicio 3 -->
            <div class="bg-white rounded-xl shadow-lg p-8 flex flex-col items-center">
                <img src="{{ asset('images/abonos.png') }}" alt="Abonos" class="w-24 h-24 mb-4">
                <h2 class="text-2xl font-semibold text-green-800 mb-2">Abonos y Mejoradores</h2>
                <p class="text-green-700 text-center">Abonos orgánicos, minerales y productos para mejorar la fertilidad del suelo.</p>
            </div>
            <!-- Servicio 4 -->
            <div class="bg-white rounded-xl shadow-lg p-8 flex flex-col items-center">
                <img src="{{ asset('images/asesoria.png') }}" alt="Asesoría Técnica" class="w-24 h-24 mb-4">
                <h2 class="text-2xl font-semibold text-green-800 mb-2">Asesoría Técnica</h2>
                <p class="text-green-700 text-center">Orientación profesional para el manejo de cultivos, control de plagas y uso eficiente de insumos.</p>
            </div>
            <!-- Servicio 5 -->
            <div class="bg-white rounded-xl shadow-lg p-8 flex flex-col items-center">
                <img src="{{ asset('images/semillas.png') }}" alt="Semillas Certificadas" class="w-24 h-24 mb-4">
                <h2 class="text-2xl font-semibold text-green-800 mb-2">Semillas Certificadas</h2>
                <p class="text-green-700 text-center">Variedad de semillas de alta calidad para asegurar el éxito de tus siembras.</p>
            </div>
            <!-- Servicio 6 -->
            <div class="bg-white rounded-xl shadow-lg p-8 flex flex-col items-center">
                <img src="{{ asset('images/distribucion.png') }}" alt="Distribución" class="w-24 h-24 mb-4">
                <h2 class="text-2xl font-semibold text-green-800 mb-2">Distribución y Entrega</h2>
                <p class="text-green-700 text-center">Llevamos tus productos hasta tu finca o negocio de manera rápida y segura.</p>
            </div>
        </div>
    </div>
</div>
