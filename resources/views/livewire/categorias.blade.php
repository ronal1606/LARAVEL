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

<div style="background: url('/ruta/a/tu/fondo.jpg') center/cover no-repeat; min-height: 100vh; padding: 1rem;">
    <h1 style="
        text-align: center;
        color: white;
        font-size: 3rem;
        margin-bottom: 2.5rem;
        font-weight: 900;
        letter-spacing: 2px;
        text-shadow: 0 4px 24px rgba(0,0,0,0.25), 0 1px 0 #333;
        font-family: 'Montserrat', 'Segoe UI', Arial, sans-serif;
        line-height: 1.1;
        ">
        <span style="background: linear-gradient(90deg, #43e97b 0%, #38f9d7 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">
            CATEGORIAS
        </span>
    </h1>
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
                    position: relative;
                    background: rgba(255,255,255,0.7);
                    backdrop-filter: blur(10px);
                    border-radius: 2rem;
                    box-shadow: 0 4px 16px rgba(0,0,0,0.12);
                    padding: 2rem;
                    margin-bottom: 3rem;
                ">
                {{-- Botón Volver al inicio --}}
                <a href="#"
                    style="
                        position: absolute;
                        top: 1.5rem;
                        right: 2rem;
                        background: #e53935;
                        color: #fff;
                        padding: 0.6rem 1.2rem;
                        border-radius: 0.7rem;
                        font-weight: bold;
                        text-decoration: none;
                        box-shadow: 0 2px 8px rgba(0,0,0,0.10);
                        transition: background 0.2s;
                        border: none;
                        cursor: pointer;
                    "
                    onmouseover="this.style.background='#b71c1c';"
                    onmouseout="this.style.background='#e53935';"
                >
                    Volver al inicio
                </a>
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
                        {{-- Tarjeta de producto --}}
                        <div 
                            x-data="{ mostrarInfo: false }"
                            style="background: #fff; border-radius: 1.2rem; box-shadow: 0 2px 8px rgba(0,0,0,0.08); padding: 1.5rem 1rem; display: flex; flex-direction: column; align-items: center; min-height: 260px; max-width: 240px; width: 100%; justify-content: flex-start; transition: box-shadow 0.25s, transform 0.25s; cursor: pointer; position: relative;"
                        >
                            @if ($producto->imagen)
                                <img src="{{ asset('storage/' . $producto->imagen) }}" alt="{{ $producto->nombre }}"
                                    style="width: 160px; height: 160px; object-fit: contain; margin-bottom: 1.2rem; display: block; margin-left: auto; margin-right: auto;">
                            @endif

                            {{-- Botón del ojo SIEMPRE visible --}}
                            <button 
                                @click="mostrarInfo = !mostrarInfo"
                                style="background: #eee; border: none; border-radius: 50%; width: 32px; height: 32px; display: flex; align-items: center; justify-content: center; position: absolute; top: 12px; right: 12px; cursor: pointer;"
                                title="Ver información"
                                type="button"
                            >
                                <svg width="20" height="20" fill="#4CAF50" viewBox="0 0 24 24">
                                    <path d="M12 5c-7.633 0-12 7-12 7s4.367 7 12 7 12-7 12-7-4.367-7-12-7zm0 12c-2.761 0-5-2.239-5-5s2.239-5 5-5 5 2.239 5 5-2.239 5-5 5zm0-8c-1.654 0-3 1.346-3 3s1.346 3 3 3 3-1.346 3-3-1.346-3-3-3z"/>
                                </svg>
                            </button>

                            {{-- Info normal --}}
                            <div x-show="!mostrarInfo" style="width: 100%;">
                                <div style="display: flex; align-items: center; width: 100%; gap: 0.3rem;">
                                    <div style="flex: 1;">
                                        <span style="font-weight: bold; color: #222; display: block; text-align: left;">{{ $producto->nombre }}</span>
                                        <span style="color: #4CAF50; font-size: 1.1rem; display: block; margin-top: 0.3rem; text-align: left;">
                                            ${{ number_format($producto->precio, 0, ',', '.') }} COP
                                        </span>
                                    </div>
                                    <button wire:click.prevent="agregarAlCarrito({{ $producto->id }})"
                                        style="background: #4CAF50; border: none; border-radius: 50%; width: 38px; height: 38px; display: flex; align-items: center; justify-content: center; cursor: pointer;">
                                        <svg width="22" height="22" fill="white" viewBox="0 0 24 24">
                                            <path d="M7 18c-1.104 0-2 .896-2 2s.896 2 2 2 2-.896 2-2-.896-2-2-2zm10 0c-1.104 0-2 .896-2 2s.896 2 2 2 2-.896 2-2-.896-2-2-2zm1.83-3.41l1.72-7.45A1 1 0 0 0 19.57 6H6.21l-.94-2H1v2h2l3.6 7.59-1.35 2.44A1.992 1.992 0 0 0 5 17a2 2 0 0 0 2 2h12v-2H7.42c-.14 0-.25-.11-.25-.25l.03-.12.9-1.63h7.45c.75 0 1.41-.41 1.75-1.03z"/>
                                        </svg>
                                    </button>
                                </div>
                            </div>

                            {{-- Info extendida --}}
                            <div x-show="mostrarInfo" style="width: 100%; text-align: left; margin-top: 1rem;">
                                <span style="font-weight: bold; color: #222;">Descripción:</span>
                                <p style="color: #444;">{{ $producto->descripcion ?? 'Sin descripción.' }}</p>
                                {{-- Puedes agregar más campos aquí --}}
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
</div>
