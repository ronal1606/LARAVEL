<?php

use Livewire\Volt\Component;

new class extends Component {
    //
}; ?>

{{-- filepath: resources/views/livewire/categorias.blade.php --}}
@php
    use App\Models\Category;
    $categorias = Category::with('products')->get();
@endphp

<div style="background: url('/ruta/a/tu/fondo.jpg') center/cover no-repeat; min-height: 100vh; padding: 2rem;">
    <h2 style="text-align: center; color: white; font-size: 2.5rem; margin-bottom: 2rem;">Categorías</h2>
    <div
        style="
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
        gap: 2.5rem;
        justify-items: center;
        max-width: 1200px;
        margin: 0 auto;
    ">
        @foreach ($categorias as $categoria)
            <a href="#cat-{{ $categoria->id }}" style="text-decoration: none;">
                <div style="
                        background: white;
                        border-radius: 2rem;
                        box-shadow: 0 4px 16px rgba(0,0,0,0.12);
                        width: 220px;
                        height: 270px;
                        padding: 1.5rem 1rem 1rem 1rem;
                        display: flex;
                        flex-direction: column;
                        align-items: center;
                        justify-content: center;
                        transition: transform 0.25s cubic-bezier(.4,2,.6,1), box-shadow 0.25s;
                        cursor: pointer;
                    "
                    onmouseover="this.style.transform='scale(1.07)';this.style.boxShadow='0 8px 32px rgba(0,0,0,0.18)';"
                    onmouseout="this.style.transform='scale(1)';this.style.boxShadow='0 4px 16px rgba(0,0,0,0.12)';">
                    @if ($categoria->image)
                        <img src="{{ asset('storage/' . $categoria->image) }}" alt="{{ $categoria->name }}"
                            style="width: 160px; height: 160px; object-fit: contain; margin-bottom: 1.2rem;">
                    @else
                        <div
                            style="width: 110px; height: 110px; background: #eee; border-radius: 1rem; margin-bottom: 1.2rem;">
                        </div>
                    @endif
                    <span
                        style="font-weight: bold; text-align: center; color: #222; font-size: 1.15rem;">{{ $categoria->name }}</span>
                </div>
            </a>
        @endforeach
    </div>

    {{-- Tarjetas grandes de categorías con productos relacionados --}}
    <div style="margin-top: 3rem;">
        @foreach ($categorias as $categoria)
            <div id="cat-{{ $categoria->id }}"
                style="
                background: rgba(255,255,255,0.7);
                backdrop-filter: blur(10px);
                border-radius: 2rem;
                box-shadow: 0 4px 16px rgba(0,0,0,0.12);
                padding: 2rem;
                margin-bottom: 3rem;
            ">
                <h3 style="color: #222; font-size: 2rem; margin-bottom: 0.5rem;">{{ $categoria->name }}</h3>
                <p style="color: #666; margin-bottom: 2rem;">{{ $categoria->description }}</p>
                <div
                    style="
                    display: grid;
                    grid-template-columns: repeat(4, 1fr);
                    gap: 2rem;
                    width: 100%;
                ">
                    @foreach ($categoria->products as $producto)
                        <div style="
                            background: #fff;
                            border-radius: 1.2rem;
                            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
                            padding: 1.5rem 1rem;
                            display: flex;
                            flex-direction: column;
                            align-items: center;
                            min-height: 260px;
                            max-width: 240px; /* <-- Cambia aquí el ancho máximo */
                            width: 100%;
                            justify-content: flex-start;
                            transition: box-shadow 0.25s, transform 0.25s;
                            cursor: pointer;
                        "
                            onmouseover="this.style.transform='scale(1.04)';this.style.boxShadow='0 8px 32px rgba(0,0,0,0.18)';"
                            onmouseout="this.style.transform='scale(1)';this.style.boxShadow='0 2px 8px rgba(0,0,0,0.08)';">
                            @if ($producto->imagen)
                                <img src="{{ asset('storage/' . $producto->imagen) }}" alt="{{ $producto->nombre }}"
                                    style="width: 160px; height: 160px; object-fit: contain; margin-bottom: 1.2rem; display: block; margin-left: auto; margin-right: auto;">
                            @endif
                            <div style="display: flex; align-items: center; width: 100%; gap: 0.3rem;">
                                <div style="flex: 1;">
                                    <span
                                        style="font-weight: bold; color: #222; display: block; text-align: left;">{{ $producto->nombre }}</span>
                                    <span
                                        style="color: #4CAF50; font-size: 1.1rem; display: block; margin-top: 0.3rem; text-align: left;">
                                        ${{ number_format($producto->precio, 0, ',', '.') }} COP
                                    </span>
                                </div>
                                <button wire:click.prevent="agregarAlCarrito({{ $producto->id }})"
                                    style="background: #4CAF50; border: none; border-radius: 50%; width: 38px; height: 38px; display: flex; align-items: center; justify-content: center; cursor: pointer;">
                                    <svg width="22" height="22" fill="white" viewBox="0 0 24 24">
                                        <path
                                            d="M7 18c-1.104 0-2 .896-2 2s.896 2 2 2 2-.896 2-2-.896-2-2-2zm10 0c-1.104 0-2 .896-2 2s.896 2 2 2 2-.896 2-2-.896-2-2-2zm1.83-3.41l1.72-7.45A1 1 0 0 0 19.57 6H6.21l-.94-2H1v2h2l3.6 7.59-1.35 2.44A1.992 1.992 0 0 0 5 17a2 2 0 0 0 2 2h12v-2H7.42c-.14 0-.25-.11-.25-.25l.03-.12.9-1.63h7.45c.75 0 1.41-.41 1.75-1.03z" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
</div>
