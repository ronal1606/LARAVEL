<x-layouts.app :title="__('Inicio')">
    <div class="relative z-10 flex flex-row items-start justify-between px-8 py-2 mb-0">
        <div class="max-w-xl">
            <div class="text-sm mb-4 italic font-serif">Original &amp; Natural</div>
            <h1 class="text-5xl md:text-6xl font-extrabold mb-4 flex items-center gap-2 font-[Oswald,sans-serif] whitespace-nowrap">
                EL DIAMANTE <span>🍋🍋</span>
            </h1>
            <p class="mb-4">
                En Agroinsumos El Diamante trabajamos día a día para brindar a nuestros clientes los mejores productos para el campo. Somos una empresa dedicada a la comercialización de insumos agrícolas como herbicidas, fungicidas, insecticidas, fertilizantes, semillas certificadas, herramientas y más, comprometidos con la calidad, la innovación y el apoyo al crecimiento del sector agropecuario.
            </p>
        </div>
        <div class="flex flex-col items-end justify-start" style="margin-top: -100px;">
            <img src="{{ asset('images/ofertas.png') }}" alt="Productos" class="w-[300px] md:w-[380px] drop-shadow-2xl">
        </div>
    </div>

    <!-- Título Top Categorías (rojo) -->
    <div class="flex items-center justify-between px-8 mt-0 mb-2">
        <h2 class="text-2xl font-bold text-white">Top Categorías</h2>
        <a href="{{ route('categorias') }}" class="text-yellow-400 font-semibold hover:underline">Ver más</a>
    </div>

    <!-- Tarjetas de Categorías (azul) -->
    <div class="relative px-8">
        <div class="flex items-end justify-between">
            <!-- Tarjetas de Categorías -->
            <div class="grid grid-cols-2 md:grid-cols-6 gap-4 w-full md:w-[85%]">
                <div class="bg-yellow-200 rounded-lg p-4 text-center shadow">
                    <div class="font-bold text-green-900">Herbicidas</div>
                    <div class="text-xs text-green-800">166 Productos</div>
                </div>
                <div class="bg-yellow-200 rounded-lg p-4 text-center shadow">
                    <div class="font-bold text-green-900">Abonos</div>
                    <div class="text-xs text-green-800">137 Productos</div>
                </div>
                <div class="bg-yellow-200 rounded-lg p-4 text-center shadow">
                    <div class="font-bold text-green-900">Fungicidas</div>
                    <div class="text-xs text-green-800">34 Productos</div>
                </div>
                <div class="bg-yellow-200 rounded-lg p-4 text-center shadow">
                    <div class="font-bold text-green-900">Semillas</div>
                    <div class="text-xs text-green-800">166 Productos</div>
                </div>
                <div class="bg-yellow-200 rounded-lg p-4 text-center shadow">
                    <div class="font-bold text-green-900">Maquinaria</div>
                    <div class="text-xs text-green-800">48 Productos</div>
                </div>
                <div class="bg-yellow-200 rounded-lg p-4 text-center shadow">
                    <div class="font-bold text-green-900">Insecticidas</div>
                    <div class="text-xs text-green-800">185 Productos</div>
                </div>
            </div>
            <!-- Tractor (verde) -->
            <img src="{{ asset('images/tractor.png') }}" alt="Tractor"
                class="ml-4 w-32 md:w-40 pointer-events-none select-none" style="z-index:1;">
        </div>
    </div>
</x-layouts.app>
