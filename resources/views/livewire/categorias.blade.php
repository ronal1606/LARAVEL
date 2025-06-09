<?php

use Livewire\Volt\Component;

new class extends Component {
    //
}; ?>

{{-- filepath: resources/views/livewire/categorias.blade.php --}}
@php
    use App\Models\Category;
    $categorias = Category::all();
@endphp

<div style="background: url('/ruta/a/tu/fondo.jpg') center/cover no-repeat; min-height: 100vh; padding: 2rem;">
    <h2 style="text-align: center; color: white; font-size: 2.5rem; margin-bottom: 2rem;">Categorías</h2>
    <div style="
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
        gap: 2.5rem;
        justify-items: center;
        max-width: 1200px;
        margin: 0 auto;
    ">
        @foreach($categorias as $categoria)
            <div
                style="
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
                onmouseout="this.style.transform='scale(1)';this.style.boxShadow='0 4px 16px rgba(0,0,0,0.12)';"
            >
                @if($categoria->image)
                    <img src="{{ asset('storage/' . $categoria->image) }}" alt="{{ $categoria->name }}" style="width: 160px; height: 160px; object-fit: contain; margin-bottom: 1.2rem;">
                @else
                    <div style="width: 110px; height: 110px; background: #eee; border-radius: 1rem; margin-bottom: 1.2rem;"></div>
                @endif
                <span style="font-weight: bold; text-align: center; color: #222; font-size: 1.15rem;">{{ $categoria->name }}</span>
            </div>
        @endforeach
    </div>
</div>
